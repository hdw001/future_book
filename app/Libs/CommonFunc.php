<?php

namespace App\Libs;

use App\Services\ConstList;
use Illuminate\Support\Facades\Log;
use DB;
use Auth;

/**
 * 通用方法类
 */
class CommonFunc
{

    public static function validateDate($date)
    {
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return $d && strtotime($d->format('Y-m-d')) === strtotime($date);
    }

    public static function validateDateYm($date)
    {
        $d = \DateTime::createFromFormat('Y-m', $date);
        return $d && $d->format('Y-m') === $date;
    }

    public static function validateDateYmN($date)
    {
        $d = \DateTime::createFromFormat('Ym', $date);
        return $d && $d->format('Ym') === $date;
    }

    public static function validateDateForce($date)
    {
        $d = \DateTime::createFromFormat('Ymd', $date);
        return $d && $d->format('Ymd') === $date;
    }


    public static function _success($data = array(), $msg = 'success')
    {
        return response()->json(
            ['code' => 2000, 'msg' => $msg, 'data' => $data]
        );
    }

    public static function _fail($msg = 'fail', $data = array())
    {
        return response()->json(
            ['code' => 4000, 'msg' => $msg, 'data' => $data]
        );
    }

    public static function _failAlert($msg)
    {
        echo "<script>alert('" . $msg . "');window.close();</script>";
        exit;
    }

    public static function getLen($str, $kangJi = 1)
    {
        $re = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        preg_match_all($re, $str, $match);

        $length = 0;
        foreach ($match[0] as $char) {
            $length += (strlen($char) > 1) ? $kangJi : 1;
        }

        return $length;
    }

    public static function ymdPlusToYmd($ymdWithPlus)
    {
        return str_replace('-', '', $ymdWithPlus);
    }


    public static function ymdHmsPlusToYmd($ymdWithPlus)
    {

        $ymd = explode(' ', $ymdWithPlus);
        return str_replace('-', '', $ymd[0]);
    }


    public static function ymdHmsToH($ymdWithPlus)
    {
        $ymdHis = explode(' ', $ymdWithPlus);
        $H = explode(':', $ymdHis[1]);
        return $H['0'];

    }

    //ymd format 20170809
    public static function ymdToWeekId($ymd)
    {
        if (strpos($ymd, '-') != false) {
            throw new \Exception('bad ymd get when processing ymdToWeekid , - found');
        }
        $ymdWithMinus = self::ymdToYmdWithMinus($ymd);
        return substr($ymd, 0, 4) . date("W", strtotime($ymdWithMinus));
    }

    //ymd format 20170809
    public static function ymdToSeason($ymd)
    {
        return date('Y') . ceil((date('n', strtotime($ymd))) / 3);
    }

    //ymd format 20170809
    public static function ymdToMonthId($ymd)
    {
        return substr($ymd, 0, 4) . substr($ymd, 4, 2);
    }

    //ymd format 20170809
    public static function ymdToYmdWithMinus($ymd)
    {
        if (strlen($ymd) !== 8) {
            throw new \Exception('bad ymd ' . $ymd . ' get when adding minus to ymd ');
        }


        return sprintf('%s-%s-%s', substr($ymd, 0, 4), substr($ymd, 4, 2), substr($ymd, 6, 2));

    }


    public static function curl($url, $params = [], $header = [], $timeout = 5)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $file_contents = curl_exec($ch);
        $errNo = curl_errno($ch);
        $errorStr = curl_error($ch);
        if ($errNo != 0) {
            $msg = "curl get :{$url},errorNo {$errNo}, error_str:{$errorStr}";
            LogService::logWrite('curlError', $msg);
        }
        curl_close($ch);
        return $file_contents;
    }

    public static function getESData($sql)
    {
        $sql = trim($sql);
        $url = 'http://' . config('database.es.host') . ':' . config('database.es.port') . '/_sql';
        $url .= '?sql=' . urlencode($sql);
        $timeStart = microtime(TRUE);
        $strRes = CommonFunc::curl($url);
        $timeEnd = microtime(TRUE);
        $timeCost = number_format($timeEnd - $timeStart, 3);
        $userId = \Illuminate\Support\Facades\Auth::id();
        LogService::logWrite('essql', '|||' . $userId . '|||' . $timeCost . '|||' . $sql . '|||');
        $res = json_decode($strRes, true);
        if ($res === NULL) {
            LogService::logWrite('es_error', '|||' . $userId . '|||' . $timeCost . '|||' . $sql . '|||' . (string)$strRes);
            self::logEsErrorToDb($sql, $strRes);
            throw  new \Exception('null get while get es data', 231623);
        } else {
            if (isset($res['error'])) {
                LogService::logWrite('es_error', '|||' . $userId . '|||' . $timeCost . '|||' . $sql . '|||' . (string)$strRes);
                self::logEsErrorToDb($sql, $strRes);
            }
        }
        return $res;
    }

    public static function logEsErrorToDb($message, $trace_as_string)
    {

        DB::table('error_log')->insert(
            [
                'trigger' => 'essql',
                'location' => 'essql',
                'message' => $message,
                'trace_as_string' => $trace_as_string,
                'data' => 'user id ' . Auth::id(),
                'trace_id' => ''
            ]
        );

    }


    //number 要格式化的数字
    //length 小数点后的长度
    public static function numFormat($number, $length)
    {
        return number_format($number, $length, '.', '');
    }

    public static function safeDivision($from, $to, $scale = 3)
    {
        if ($to == 0) {
            return 0;
        }
        // $from/$to
        return bcdiv($from, $to, $scale);

    }

    public static function getSql(\Illuminate\Database\Query\Builder $model)
    {
        $sql = self::replace($model->toSql(), $model->getBindings());
        $sql = str_replace('`', '', $sql);
        return $sql;
    }

    private static function replace($sql, $bindings)
    {
        $needle = '?';
        foreach ($bindings as $replace) {
            $pos = strpos($sql, $needle);
            if ($pos !== false) {
                $sql = substr_replace($sql, $replace, $pos, strlen($needle));
            }
        }
        return $sql;
    }

    public static function random_color()
    {
        mt_srand((double)microtime() * 1000000);
        $c = '';
        while (strlen($c) < 6) {
            $c .= sprintf("%02X", mt_rand(0, 255));
        }
        return '#' . $c;
    }

    public static function utf8ToGb2312($string)
    {
        if (!is_string($string)) {
            return $string;
        }
        return iconv('UTF-8', 'GBK//IGNORE', $string);
    }

    static public function getUserInfo()
    {
        return DB::table('users')->where('id', Auth::User()->id)->select('is_admin', 'role_id', 'media_json')->first();
    }

}
