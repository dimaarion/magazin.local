<?php
class Sansize
{
        public function getrequest($get)
        {
                return filter_var($_REQUEST[$get], FILTER_SANITIZE_STRING);
        }

        public function getrequestcontent($get)
        {
                return htmlspecialchars($_REQUEST[$get]);
        }

        public function getrequestEmail($get)
        {
                return filter_var($_REQUEST[$get], FILTER_SANITIZE_EMAIL);
        }
        
        public function getrequestInt($get)
        { 
                return filter_var($_REQUEST[$get], FILTER_SANITIZE_NUMBER_INT);
        }
        public function intFilter($val)
        {
                if (isset($val)) {
                        if (is_int($val)) {
                                return $val;
                        } else {
                                if (is_numeric($val)) {
                                        return intval($val);
                                } else {
                                        return 0;
                                }
                        }
                } else {
                        return 0;
                }
        }
}
