<?php
    require './vendor/autoload.php';
    use Classes\Employee;
    use Classes\Department;
    echo '<p> Validation tests </p>';
    $employee1 = new Employee(423,'Dmitry',45992,'2000-11-1');
    echo '<p>Experince of employee ',$employee1->Experince(),'</p>';
    echo '<p>Experince of employee ',$employee1->getSalary_employee(),' $</p>';
    echo '<p> ---------------------------------------------- </p>';
    $employee2 = new Employee(423,'Dmitry',45992,'2200-11-1');
    echo '<p> ---------------------------------------------- </p>';
    $employee3 = new Employee(423,'Dmitry',-2000,'2000-11-1');
    echo '<p> ---------------------------------------------- </p>';
    $employee4 = new Employee(-423,'Dmitry',45992,'2000-11-1');
    echo '<p> ---------------------------------------------- </p>';
    $employee5 = new Employee('', '', '', '');
    echo '<p> ---------------------------------------------- </p>';

    $worker1 = new Employee(101,'Anderson',60000,'2021-11-1');
    $worker2 = new Employee(102,'Lera',20000,'2011-11-1');
    $worker3 = new Employee(103,'Ivan',50000,'2012-11-1');
    $worker4 = new Employee(104,'Nick',30000,'2020-11-1');
    $worker5 = new Employee(105,'Anderson',30000,'2021-11-1');
    
    echo '<p> ---------------------------------------------- </p>';
    $departament1 = new Department('UX/UI',array($worker1,$worker2));
    $departament2 = new Department('Backend',array($worker3));
    $departament3 = new Department('Server',array($worker4,$worker5));
    $departament = array($departament1,$departament2,$departament3);
    $departament_min=array();
    $departament_max=array();
    $min = $departament[0]->getSalary_expenses();
    $max = $min;
    for($i = 0; $i< count($departament);$i++){
        $tempory= $departament[$i]->getSalary_expenses();
        if($tempory>$max){
            $departament_max=array($departament[$i]);
            $max=$tempory;
        }
        else if ($tempory==$max){
            array_push($departament_max,$departament[$i]);
        }
        if($tempory<$min){
            $departament_min=array($departament[$i]);
            $min=$tempory;
        }
        else if ($tempory==$min){
            array_push($departament_min,$departament[$i]);
        }
    }
    $arr_max = array();
    foreach($departament_max as $temp){
        array_push($arr_max,count($temp->get_workers()));
    }
    $max = max($arr_max);
    foreach($departament_max as $temp){
        if(count($temp->get_workers())==$max){
            echo "<p> Departament with max ".$temp->get_Name_of_department()." with sum of Salary expenses ".$temp->getSalary_expenses()."</p>";
        }
    }
    $arr_min = array();
    foreach($departament_min as $temp){
        array_push($arr_min,count($temp->get_workers()));
    }
    $min = min($arr_min);
    foreach($departament_min as $temp){
        if(count($temp->get_workers())==$min){
            echo "<p> Departament with min ".$temp->get_Name_of_department()." with sum of Salary expenses ".$temp->getSalary_expenses()."</p>";
        }
    }