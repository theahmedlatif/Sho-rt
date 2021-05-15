<?php
namespace Short;

require_once dirname(__DIR__,1).'/vendor/autoload.php';
use Envelope\Database\MysqlDatabase;

class Link extends MysqlDatabase {
    private $inputLink;
    private $outputLink;
    private $userId;

    public function shortenLink($link)
    {
        $random_chars = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $output = preg_replace("/[^a-zA-Z]+/", "", $link);
        $output = trim($output);
        $output = htmlspecialchars($output);
        $random = rand (0,15);
        $output = substr(str_shuffle($output),0,5);
        $random_str = substr(str_shuffle($random_chars),$random,3);
        if (strtolower(substr($link,0,5))  == "https")
        {
            return 'https://sho.rt/' . $output . $random_str . '/';
        }
        else
        {
            return 'http://sho.rt/' . $output . $random_str . '/';
        }

    }

    public function storeLink($inputLink, $outputLink, $userEmail)
    {
        $newLink = new MysqlDatabase();
        $newLink->getConnection();

        $binders = [":inputLink" => $inputLink,":outputLink" => $outputLink,":userEmail" => $userEmail];
        $newLink->insert("INSERT INTO links (inputLink, outputLink, userId)
                                   VALUES (:inputLink, :outputLink, :userEmail)", $binders);
        $newLink->closeConnection();
    }
}