<!DOCTYPE html>
<html lang="<?php echo $adminlang; ?>"<?php echo $languageRTL;?>>
<head>
    <?php 
        App()->getClientScript()->registerPackage('jqueryui');
        App()->getClientScript()->registerPackage('jquery-cookie');
        App()->getClientScript()->registerPackage('jquery-superfish');
        App()->getClientScript()->registerPackage('jqgrid');
        App()->getClientScript()->registerScriptFile(Yii::app()->getConfig('third_party') . 'jquery-qtip/jquery.qtip-1.0.0-rc3.min.js');
        App()->getClientScript()->registerScriptFile(Yii::app()->getConfig('adminscripts') . "admin_core.js");
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('styleurl') . "adminstyle.css" );
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') . "jquery-ui/jquery-ui.css" );
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') . "printablestyle.css", 'print');
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') . "adminstyle.css" );
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') . "superfish.css" );
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('publicstyleurl') . 'jquery.multiselect.css');
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('publicstyleurl') . 'jquery.multiselect.filter.css');
        App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') .  "displayParticipants.css");
    ?>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    
    <?php echo $datepickerlang;?>
    <title><?php echo $sitename;?></title>
    <?php

        
            ?>
    <link rel="shortcut icon" href="<?php echo $baseurl;?>styles/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="<?php echo $baseurl;?>styles/favicon.ico" type="image/x-icon" />
    <?php echo $firebug ?>
    <?php $this->widget('ext.LimeScript.LimeScript'); ?>
</head>
<body>
<?php if(isset($formatdata)) { ?>
    <script type='text/javascript'>
        var userdateformat='<?php echo $formatdata['jsdate']; ?>';
        var userlanguage='<?php echo $adminlang; ?>';
    </script>
    <?php } ?>
<div class='wrapper'>
    <?php $this->widget('ext.FlashMessage.FlashMessage'); ?>
    <div class='maintitle'><?php echo $sitename; ?></div>
