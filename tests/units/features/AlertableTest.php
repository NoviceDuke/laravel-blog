<?php

namespace Tests\units\features;

use Tests\TestCase;
use App\Http\Helpers\Alertable;

class AlertableTest extends TestCase
{
    use Alertable;
    /**
     * 測試使用allert.
     */
    public function testAlertWillFlashSessionByDefault()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $this->alert()->flashIt();
        $this->assertSessionHas('alert_message.title', 'default title');
        $this->assertSessionHas('alert_message.message', 'Hi Im Default Alert!');
        $this->assertSessionHas('alert_message.level', 'info');
    }

    /**
     * 測試使用allert 並指定標題與內容.
     */
    public function testAlertWillFlashSessionWithTitleAndMessage()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $this->alert('mytitle', 'mymessage')->flashIt();
        $this->assertSessionHas('alert_message.title', 'mytitle');
        $this->assertSessionHas('alert_message.message', 'mymessage');
        $this->assertSessionHas('alert_message.level', 'info');
    }

    /**
     * 測試使用allert 並指定magic method.
     */
    public function testAlertWillFlashSessionWithMagicMethod()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $this->alert('mytitle', 'mymessage')->success()->flashIt();
        $this->assertSessionHas('alert_message.title', 'mytitle');
        $this->assertSessionHas('alert_message.message', 'mymessage');
        $this->assertSessionHas('alert_message.level', 'success');
    }

    /**
     * 測試使用allert 並指定錯誤的magic method.
     */
    public function testAlertWillFlashSessionWithErrorMagicMethod()
    {
        $this->printTestStartMessage(__FUNCTION__);

        try {
            $this->alert('mytitle', 'mymessage')->danger()->flashIt();
            $this->fail('Expected exception [Error SweetAllert Type] not thrown');
        } catch (\Exception $e) {
            $this->assertContains('danger', $e->getMessage());
        }
    }
}
