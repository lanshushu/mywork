<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */

$this->title = '配置权限';
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <form action="<?=Url::toRoute(['permission/set','id'=>$id])?>" method="post">
        <input name="parent" type="hidden" value="<?=$id?>">
        <label><input type="checkbox" class="chkall" name="checkall" value="1">全选</label>&nbsp;&nbsp;

        <?php foreach($items as $v):?>
            <label><input type="checkbox" class="chk" name="permission[]" value="<?=$v->name?>"><?=$v->name?></label>&nbsp;&nbsp;
        <?php endforeach;?>
        <br>
        <br>
        <br>
        <input type="submit" value="保存" class="btn btn-primary">
    </form>


</div>
<script type="text/javascript">
    $(document).ready(function () {
        var num = 0;
        var permission = <?= json_encode($Permission);?>;
        $('.chk').each(function(){
            var self = $(this);
            var selfVal = self.val();
            $.each(permission, function(n, v){
                if(v.name == selfVal){
                    self.attr('checked' , 'true');
                    num++;
                };
            });
        });
        var nums = $('.chk').size(); //全选勾中
        if(nums == num){
            $('.chkall').attr("checked",true);
        }

        $(".chkall").click(function(){
            var isChecked = $(this).prop("checked");
            $("input[name='permission[]']").prop("checked", isChecked);
        });

    });
</script>