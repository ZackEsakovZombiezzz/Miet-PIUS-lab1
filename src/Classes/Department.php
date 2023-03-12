<?php 
namespace Classes;
use ArrayObject;

    class Department{
        private $name_of_department;
        private $workers;
        public function __construct($name,$List_Workers){
            $this->name_of_department=$name;
            $this->workers=new ArrayObject($List_Workers);
        }
        public function get_Name_of_department(){
            return $this->name_of_department;
        }
        public function get_workers(){
            return $this->workers;
        }
        public function getSalary_expenses(){ //расходы компании на зарплату сотрудников
            $sum =0;
            foreach($this->workers as $worker){
                $sum=$sum+$worker->getSalary_employee();
            }
            return $sum;
        }
    }
?>