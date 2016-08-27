<?php
namespace Tests\units\traits;
/**
 *  在測試時能在Terminal中列印訊息
 */
trait MessagePrintable
{
    /**
     * 印出某段訊息.
     */
    public function printMessage($message)
    {
        return print  "\r\n[".class_basename($this).']'.' '.$message."\r\n";
    }
    /**
     * 印出該測試執行開始的通知訊息.
     */
    public function printTestStartMessage($functionName)
    {
        return print  "\r\n[".class_basename($this).']'.' '.$functionName."...\r\n";
    }
}
