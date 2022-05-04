<?php
namespace App\Core;

class Encode
{
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

    public function EncryptionAES($data){
        
    }

    public function DecryptionAES($data){
        
    }
    public function EncryptionRSA($data, $p, $q, $b){
        $n=$p*$q;
        $_n=($p-1)*($q-1);
        $a=$this->Euclide($_n,$b);

    }

    public function DecryptionRSA($data){
        
    }
}
?>