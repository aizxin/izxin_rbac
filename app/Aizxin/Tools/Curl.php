<?php
namespace Aizxin\Tools;

/**
 * @description: 封装CURL扩展
 * @编码规范
 * @class 类名首字母大写，类名为多个单词, 每个大字首字母大写 eg: class Curl , class CurlPage
 * @variable 变量名小写, 变量名为多个单词, 每个单词小写，使用下划线_分割 eg: $curl_result
 * @function 函数名与类名规则相同 eg: function SendRequest
 * @params 函数形参规则与变量名相同
 * @class-variable 成员变量,以下划线结尾,多个单词使用下划线分隔. eg: private $host_name_
 */
/**
 * @请求的host
 */
class Curl {

    private $host_;

    /**
     * @curl 句柄
     */
    private $ch_;

    /**
     * @超时限制时间
     */
    const time_ = 5;

    /**
     * @请求的设置
     */
    private $options_;

    /**
     * @保存请求头信息
     */
    private $request_header_;

    /**
     * @保存响应头信息
     */
    private $response_header_;

    /**
     * @body_ 用于保存curl请求返回的结果
     */
    private $body_;

    /**
     * @读取cookie
     */
    private $cookie_file_;

    /**
     * @写入cookie
     */
    private $cookie_jar_;

    /**
     * @todo proxy
     * @构造函数，初始化CURL回话
     */
    public function Start($url) {
        $this->ch_ = curl_init($url);
//        curl_setopt($this->ch_, CURLOPT_HEADER, 1);
        curl_setopt($this->ch_, CURLOPT_RETURNTRANSFER, 1);
    }

    /**
     * @返回响应头
     */
    public function ResponseHeader($url) {
        if (!function_exists('http_parse_headers')) {

            function http_parse_headers($raw_headers) {
                $headers = array();
                foreach (explode("\n", $raw_headers) as $i => $h) {
                    $h = explode(':', $h, 2);
                    if (isset($h[1])) {
                        if (!isset($headers[$h[0]])) {
                            $headers[$h[0]] = trim($h[1]);
                        } else if (is_array($headers[$h[0]])) {
                            $tmp = array_merge($headers[$h[0]], array(trim($h[1])));
                            $headers[$h[0]] = $tmp;
                        } else {
                            $tmp = array_merge(array($headers[$h[0]]), array(trim($h[1])));
                            $headers[$h[0]] = $tmp;
                        }
                    }
                }
                return $headers;
            }

        }
        $this->Start($url);
        curl_setopt($this->ch_, CURLOPT_TIMEOUT, Curl::time_);
        $this->body_ = $this->Execx();
        $header_size = curl_getinfo($this->ch_, CURLINFO_HEADER_SIZE);
        $this->response_header_ = substr($this->body_, $start = 0, $offset = $header_size);
        $this->response_header_ = http_parse_headers($this->response_header_);
        print_r($this->response_header_);
        return $this->Close($this->body_);
    }

    /**
     * @读取cookie
     */
    public function LoadCookie($url, $cookie_file) {
        $this->Start($url);
        curl_setopt($this->ch_, CURLOPT_COOKIE, 1);
        curl_setopt($this->ch_, CURLOPT_COOKIEFILE, $cookie_file);
        $this->body_ = $this->Execx();
        return $this->Close($this->body_);
    }

    /**
     * @写入cookie
     */
    public function SaveCookie($url) {
        $this->Start($url);
        curl_setopt($this->ch_, CURLOPT_COOKIE, 1);
        curl_setopt($this->ch_, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt($this->ch_, CURLOPT_COOKIEJAR, 'cookie.txt');
        $this->body_ = $this->Execx();
        return $this->Close($this->body_);
    }

    /**
     * @设置HEADER
     */
    public function SetHeader($headers = null) {
        if (is_array($headers) && count($headers) > 0) {
            curl_setopt($this->ch_, CURLOPT_HTTPHEADER, $headers);
        }
    }

    /**
     * @GET请求
     */
    public function Get($url, array $params = array()) {
        if ($params) {
            if (strpos($url, '?')) {
                $url .= "&" . http_build_query($params);
            } else {
                $url .= "?" . http_build_query($params);
            }
        }
        $this->Start($url);
        curl_setopt($this->ch_, CURLOPT_TIMEOUT, Curl::time_);
        if (strpos($url, 'https') === 0) {
            curl_setopt($this->ch_, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($this->ch_, CURLOPT_SSL_VERIFYPEER, 0);
        }
        $this->body_ = $this->Execx();
        return $this->Close($this->body_);
    }

    /**
     * @POST请求
     */
    public function Post($url, array $params = array()) {
        $this->Start($url);
        curl_setopt($this->ch_, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->ch_, CURLOPT_HTTPHEADER, array("Content-Type: Aizxinlication/x-www-form-urlencoded"));
        curl_setopt($this->ch_, CURLOPT_POST, true);
        curl_setopt($this->ch_, CURLOPT_TIMEOUT, Curl::time_);
        if ($params) {
            curl_setopt($this->ch_, CURLOPT_POSTFIELDS, http_build_query($params));
        }
        $this->body_ = $this->Execx();
        return $this->Close($this->body_);
    }

    /**
     * @tips: google http head 方法
     */
    public function Head($url, array $params = array()) {
        $this->Start($url);
        curl_setopt($this->ch_, CURLOPT_TIMEOUT, Curl::time_);
        curl_setopt($this->ch_, CURLOPT_RETURNTRANSFER, 0);
        curl_setOpt($this->ch_, CURLOPT_NOBODY, true);
        $this->body_ = $this->Execx();
        return $this->Close($this->body_);
    }

    /**
     * @执行CURL会话
     */
    public function Execx() {
        return curl_exec($this->ch_);
    }

    /**
     * @关闭CURL句柄
     */
    public function Close($body_) {
        if ($body_ === false) {
            echo "CURL Error: " . curl_error($body_);
            return false;
        }
        curl_close($this->ch_);
        return $body_;
    }

}
