<?php 
 require_once __DIR__.'/vendor/autoload.php';
 use Symfony\Component\Validator\Constraints\Length;
 use Symfony\Component\Validator\Constraints\NotBlank;
 use Symfony\Component\Validator\Validation;

 $validator = Validation::createValidator();
 $name = $_POST['title'];
 $violations = $validator->validate($name, [
     new Length(['min' => 10]),
     new NotBlank(),
 ]);
 
 if (0 !== count($violations)) {
     // there are errors, now you can show them
     foreach ($violations as $violation) {
         echo $violation->getMessage().'<br>';
         echo $violation;
     }
 }else{
    echo "hi";
 }