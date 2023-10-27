<?php
require_once '../dbconnect.php';
class UserLogic
{
    /**
     * ユーザを登録する
     * @param array $userData
     * @return bool $result
     */
    public static function createUser($userData)
    {
        $result = false;
        $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';
        $arr = [];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);
        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (\Exception $e) {
            echo $e;
            error_log($e, 3, '../error.log');
            return $result;
        }
    }
    /**
     * ログイン処理
     * @param string $email
     * @param string $password
     * @return bool $result
     */
    public static function login($email, $password)
    {
        $result = false;
        $user = self::getUserByEmail($email);
        if (!$user) {
            $_SESSION['msg'] = 'emailが一致しません。';
            return $result;
        }
        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['login_user'] = $user;
            $result = true;
            return $result;
        }
        $_SESSION['msg'] = 'パスワードが一致しません。';
        return $result;
    }
    /**
     * emailからユーザを取得
     * @param string $email
     * @return array|bool $user|false
     */
    public static function getUserByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $arr = [];
        $arr[] = $email;
        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($arr);
            $user = $stmt->fetch();
            return $user;
        } catch (\Exception $e) {
            return false;
        }
    }
    /**
     * ログインチェック
     * @param void
     * @return bool $result
     */
    public static function checkLogin()
    {
        $result = false;
        if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0) {
            return $result = true;
        }
        return $result;
    }
    /**
     * ログアウト処理
     */
    public static function logout()
    {
        $_SESSION = array();
        session_destroy();
    }
    public static function getresult($result1, $email)
    {
        $sql = "UPDATE users SET result = :result1 WHERE email = :email";
        try {
            $stmt = connect()->prepare($sql);
            $stmt->bindParam(':result1', $result1, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "データベースエラー: " . $e->getMessage();
            error_log($e->getMessage(), 0);
            return false;
        }
    }
}
