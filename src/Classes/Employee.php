<?php 
    namespace Classes;
    use Symfony\Component\Validator\Validation;
    use Symfony\Component\Validator\Constraints\Positive;
    use Symfony\Component\Validator\Constraints\NotBlank;
    use Symfony\Component\Validator\Constraints\Date;
    use Symfony\Component\Validator\Constraints\LessThan;
    use Symfony\Component\Validator\Constraints\LessThanOrEqual;
    use Symfony\Component\Validator\Constraints\Regex;
    use Symfony\Component\Validator\Constraints\DateTime;
    class Employee
    {
        private $id_employee= NULL;
        private $name_employee = NULL;
        private $salary_employee = NULL;
        private $DOE = NULL; // DOE-date of employment - дата принятие на работу
    
        public function __construct($id_employee, $name_employee,$salary_employee,$DOE){
            $now = new \DateTime();
            $validator = Validation::createValidator();
            $violation = $validator->validate($id_employee,[
                new NotBlank(),
                new Positive()
            ]);
            $violation->addAll($validator->validate($DOE,[
                new NotBlank(),
                new DateTime('Y-m-d'),
            ]));
            $violation->addAll($validator->validate(new \DateTime($DOE),[
                new LessThanOrEqual($now)
            ]));
            $violation->addAll($validator->validate($salary_employee,[
                new NotBlank(),
                new Positive()
            ]));
            $violation->addAll($validator->validate($name_employee,[
                new NotBlank(),
                new Regex('/^(\\w{4,})$/')
            ]));

            if(count($violation) !== 0){
                echo'User is not createt';
                foreach($violation as $error){
                    echo '<p>',$error->getMessage(),'</p>';
                }
            }else{
                $this->name_employee = $name_employee;
                $this->salary_employee = $salary_employee;
                $this->id_employee = $id_employee;
                $this->DOE = date_create_from_format('Y-m-d',$DOE);
                echo'<p>Employee is created </p>';
            }

        }

        public function getName_employee(){
            return $this->name_employee;
        }
        public function getId_employee()
        {
            return $this->id_employee;
        }
        public function getSalary_employee()
        {
            return $this->salary_employee;
        }
        public function getDOE()
        {
            return $this->DOE;
        }
        public function Experince(){
            return date_diff(new \DateTime('@'.strtotime('now')),$this->DOE)->y;
        }
        public function SetSalary_employee($salary_employee){ //Зарплата может менятся и надо добавить возможность менять её.
            $validator = Validation::createValidator();
            $violation = $validator->validate($salary_employee,[
                new Positive(),
                new NotBlank()
            ]);
            if(count($violation) !== 0){
                echo'Salary dont change';
            }else{
                $this->salary_employee = salary_employee;
                echo'Salary is changed';

            }
            
        }
    }

    ?>
    
    