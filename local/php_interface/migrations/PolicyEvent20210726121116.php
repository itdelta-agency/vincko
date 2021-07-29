<?php

namespace Sprint\Migration;


class PolicyEvent20210726121116 extends Version
{
    protected $description = "";

    protected $moduleVersion = "3.28.7";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Event()->saveEventType('POLICY_PAY', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Страховой полис оплачен',
  'DESCRIPTION' => '',
  'SORT' => '150',
));
        $helper->Event()->saveEventType('POLICY_PAY', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => '',
  'DESCRIPTION' => '',
  'SORT' => '150',
));
        $helper->Event()->saveEventMessage('POLICY_PAY', array (
  'LID' => 
  array (
    0 => 'v1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => ' #DEFAULT_EMAIL_FROM# ',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Ссылка на страховой полис из заказа N#ORDER_ID#',
  'MESSAGE' => '<div style="background: #fff; text-align: center; padding: 36px 0 28px; display: block;">
<div style="display: block; font-style: normal; font-weight: bold; font-size: 36px; line-height: 44px; color: #005dff; text-align: center;">Здравствуйте, #ORDER_USER#</div>
<div style="display: block; font-style: normal; font-weight: 600; font-size: 18px; line-height: 21px; color: #000; margin: 17px 0 0 0; text-align: center;">Вами был оплачен заказ <span style="color: #005dff;">№#ORDER_ID#</span></div>
</div>

<div style="display: block; padding: 40px 20px 0;">
<div style="display: block; color: #020202; font-weight: 600; font-size: 20px; line-height: 24px; margin: 0 0 24px 0;">Сформирована ссылка на страховой полис</div>
<a href="#SERVER_NAME#/lk/orders/policy/?ORDER_ID=117" style="display: inline-block; background: #005dff; color: #fff; font-size: 14px; line-height: 48px; text-transform: uppercase; text-decoration: none; padding: 0 83px; margin: 24px 0 0 0;">Поставить оценку</a>

</div>

<div style="display: block; background: #fff; padding: 33px 0 24px; margin: 60px 0 0 0; text-align: center;">
<div style="display: block; color: #000; font-size: 18px; line-height: 21px; text-align: center;">Благодарим за доверие. Пожалуйста, оцените работу охранной<br/>
организации, которую Вы выбрали, на нашем сайте</div>
<a href="#SERVER_NAME#" style="display: inline-block; background: #005dff; color: #fff; font-size: 14px; line-height: 48px; text-transform: uppercase; text-decoration: none; padding: 0 83px; margin: 24px 0 0 0;">Поставить оценку</a>
</div>',
  'BODY_TYPE' => 'text',
  'BCC' => '',
  'REPLY_TO' => '',
  'CC' => '',
  'IN_REPLY_TO' => '',
  'PRIORITY' => '',
  'FIELD1_NAME' => '',
  'FIELD1_VALUE' => '',
  'FIELD2_NAME' => '',
  'FIELD2_VALUE' => '',
  'SITE_TEMPLATE_ID' => 'v_email',
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ POLICY_PAY ] Страховой полис оплачен',
));
    }

    public function down()
    {
        //your code ...
    }
}
