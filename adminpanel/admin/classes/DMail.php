<?php
class DMail{
    public $to = '';
    public $from = '';
    public $tema = '';
    public $message = [];
    
public function __construct($to, $from, $tema, $message = [])
{
        $this->to = $to;
        $this->from = $from;
        $this->tema = $tema;
        $this->message = $message;
        $this->maills();
}
    public  function maills()
    {
        
        
        $subject = $this->tema;
        $boundary = "---"; //Разделитель
        /* Заголовки */
        $headers = "From: $this->from\nReply-To: $this->from\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
        $body = "--$boundary\n";
        /* Присоединяем текстовое сообщение */
        foreach ($this->message as $key => $value) {
            $body .= "$value\n";
        }
        $body .= "--$boundary\n";
        mail($this->to, $this->tema, $body, $headers); //Отправляем письмо

    }

}