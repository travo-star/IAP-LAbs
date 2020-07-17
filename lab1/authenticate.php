<?php
    interface Authentication{
        public function hashPassword();
        public function isPasswordCorrect();
        public function login();
        public function logout();
        public function createFormErrorSessions($problem);
    }
?>