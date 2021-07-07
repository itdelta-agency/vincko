<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if (isset($_POST['phone']) && !empty($_POST['phone'])) {
    $phoneNumber = $_POST['phone'];
    $phoneNumber = trim($phoneNumber);
    $phoneNumber = strip_tags($phoneNumber);
    $phoneNumber = htmlspecialchars($phoneNumber);
    $activeFrom = date('d.m.Y H:i:s', time());
    if(CModule::IncludeModule("iblock")){
        $el = new CIBlockElement;

        $arLoadProductArray = Array(
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"       => 23,
            "NAME"            => "Заявка",
            "ACTIVE_FROM" => $activeFrom,
            "PROPERTY_VALUES" => array("PHONE"=>$phoneNumber),
            "ACTIVE"          => "Y"
        );
        if ($elID = $el->Add($arLoadProductArray)) {
            echo json_encode(array('success' => true)); exit;
        } else {
            echo json_encode(array('success' => false, 'error' => $el->LAST_ERROR)); exit;
        }
    }

}
?>