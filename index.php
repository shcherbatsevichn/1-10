<?php 
error_reporting(-1);
//Найти все меньшие N числа-палиндромы, которые при возведении в квадрат дают палиндром. 
//Число называется палиндромом, если его запись читается одинаково с начала и с конца.
$n = 400;  





for($m = $n; $m > 0; $m--){
    if(is_palindrom($m)){
        $mq = pow($m, 2);
        if(is_palindrom($mq)){
            echo ($m." - value <br>");
            echo ($mq." -sqrt value<br>");
            echo ("========================<br>");
        }
            
            
    }   
    
}



function is_palindrom($liter){
    //-----------------------определяем длину числа n
    $counter = 0;                  //узнаём длину числа
    $i=10;
    while($liter % $i != $liter){
    $counter++; // длинна числа
    $i *= 10;
    }

    $count = 0; // счётчик совпадений
    for($a = 0; $a < $counter; $a++){  // проходимся по числу counter раз 
        $num1 = 0;  //для n
        $num2 = 0;
        $value = $liter; 
        $value2 = $liter; 
        $flagsave = 0; //разрешаем запись в текущей итерации
        $flagsavest = 0;
        $b = 0; // счётчик итераций цикла while n
        $c = 0;
        while($value != 0){  
            $num1 = round((($value / 10 )- (floor($value / 10)) )*10);  //раскладываем число на цифры
            $value = floor($value / 10);  
            if($flagsave == 0){ //разрешение на запись 
                if($a == $b){   // проверка синхронизации итераций двух циклов
                    $nums = $num1; //записываем текущую цифру, далее сравниваем её с остальными.
                    $flagsave = 1; // запрещаем запись остальных цифр 
                    //echo ($nums."- nums<br>");
                }
            }
            $b++;
        }

        while($value2 != 0){  
            $num2 = round((($value2 / 10 )- (floor($value2 / 10)) )*10);  //раскладываем число на цифры
            $value2 = floor($value2 / 10);  
            if($flagsavest == 0){ //разрешение на запись 
                if($counter - $a == $c){   // проверка синхронизации итераций двух циклов
                    $numst = $num2; //записываем текущую цифру, далее сравниваем её с остальными.
                    $flagsavest = 1; // запрещаем запись остальных цифр 
                    //echo ($numst."- numst<br>");
                }
            }
            $c++;
        }
        if($nums == $numst){  //сравниваем текущие записанные цифры n и nq
            $count++;
        }
        
    }
    if($counter > 0){
        if($counter == $count){
            return true;
        }else{
            return false;
        }
    
    }else{
        return false;
    }
    
}