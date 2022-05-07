<?php
namespace App\Core;

class Encode
{  
    protected $p=2;
    protected $q=3;
    protected $b=2;  

    public function EncryptionRSA($text){
        $n=$this->p * $this->q;
        $arr=str_split($text);
        for ($i=0; $i<strlen($text); $i++){
            $arr[$i]=chr($this->JL_powmod(ord($arr[$i]),$this->b,$n));
        }
        return implode("",$arr);
    }

    public function DecryptionRSA($text){
        $n=$this->p * $this->q;
        $_n=($this->p-1)*($this->q-1);
        $a=$this->Euclide($_n,$this->b);
        $arr=str_split($text);
        for ($i=0; $i<strlen($text); $i++){
            $arr[$i]=chr($this->JL_powmod(ord($arr[$i]),$a,$n));
        }
        return implode("",$arr);
    }
    
    function JL_powmod( $num, $pow, $mod) {
        if ( function_exists('bcpowmod')) {
            return bcpowmod( $num, $pow, $mod);
        }
        $result= '1';
        do {
            if ( !bccomp( bcmod( $pow, '2'), '1')) {
                $result = bcmod( bcmul( $result, $num), $mod);
            }
           $num = bcmod( bcpow( $num, '2'), $mod);
     
           $pow = bcdiv( $pow, '2');
        } while ( bccomp( $pow, '0'));
        return $result;
    }  
    
    public function Euclide($num, $a){
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
}
?>