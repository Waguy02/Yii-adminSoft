<div class="BdManager1-default-index    ">
    <p>

        <?php
        use yii\helpers\Html;
        use yii\widgets\ActiveForm;

        use kartik\password\PasswordInput;

        ?>
        <div >

        <H1> Paramètres de connexion à la base de données  </H1>
    </div>
    </p>

    <?php









    $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ]) ?>
    <?= $form->field($bdForm, 'dsn')->label('Url de BD')?>
    <?= $form->field($bdForm, 'username')->label("Nom d'utilisateur") ?>


    <?= $form->field($bdForm, 'password')->label("Mot de passe")->widget(PasswordInput::classname(), [
    'pluginOptions' => [
    'showMeter' => false,
    'toggleMask' => true
     ]])  ?>
    <?= $form->field($bdForm,'charset')->label('Jeu de caractères')?>


    <div class="form-group">

        <div class="col-lg-2">
            <?= Html::submitButton('Enregistrer la configuration', ['class' => 'btn btn-primary']) ?>

        </div>


        <div class="col-lg-offset-8 col-lg-2">
        <?= Html::button("Tester la connexion",['class'=>'btn btn-primary','id'=>'testButton']) ?>
        </div>



    </div>
    <?php ActiveForm::end() ?>

    <div class="container row " id="testResult">


    </div>
<?php

?>

    <?php

    $this->registerJs(
            <<<JS
                 
                 
                 $("#testButton").click(()=>
                  {
                            
                      $.get("BDManager/default/test").done(function(data){
                                
                                $("#testResult").html(data);
                                }); 
                     })
                        


JS

        );

    ?>



</div>
