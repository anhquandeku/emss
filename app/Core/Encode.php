<?php
namespace App\Core;

class Encode
{
    public static function Euclide($num, $a){
        $n=$num;
        $x2=1; $x1=0; $y2=0; $y1=1;
        while($a>0){
            $q=$n/$a;
            $r=$n-$q*$a;
            $x=$x2-$q*$x1;
            $y=$y2-$q*$y1;
            $n=$a;
            $a=$r;
            $x2=$x1;
            $x1=$x;
            $y2=$y1;
            $y1=$y;            
        }
        return $num+$y2;
    }

    public static function encodeAES($data){
        
    }

    public static function decryptionAES($data){
        
    }
    public static function encodeRSA($data){
        
    }

    public static function decryptionRSA($data){
        
    }
}
?>