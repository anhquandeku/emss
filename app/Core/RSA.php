<?php
namespace App\Core;

class RSA
{
    protected $p=2;
    protected $q=3;
    protected $b=2; 
    public $base10='0123456789';
    public $baseText='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghiklmnopqrstuvwxyz0123456789 ';
    
    public function EncryptionRSA($text){
        $n=bcmul($this->p, $this->q);
        $num=$this->baseToBase($text,$this->baseText,$this->base10);
        $mod=bcpowmod($num,$this->b,$n);
        return $this->baseToBase($mod,$this->base10,$this->baseText);
    }

    public function DecryptionRSA($text){
        $n=bcmul($this->p, $this->q, $this->base10);
        $_n=bcmul(bcsub($this->p,'1'), bcsub($this->q,'1'));
        $a=$this->Euclide_extend($_n,$this->b);
        $num=$this->baseToBase($text,$this->baseText,$this->base10);
        $mod=bcpowmod($num,$a,$n);
        return $this->baseToBase($mod,$this->base10,$this->baseText);
    }
    
    public function Euclide_extend($num, $a){
        $n=$num;
        $x2='1'; $x1='0'; $y2='0'; $y1='1';
        while(bccomp($a,'0')==1){
            $q=bcdiv($n,$a);
            $r=bcsub($n,bcmul($q,$a));
            $x=bcsub($x2,bcmul($q,$x1));
            $y=bcsub($y2,bcmul($q,$y1));
            $n=$a;
            $a=$r;
            $x2=$x1;
            $x1=$x;
            $y2=$y1;
            $y1=$y;            
        }
        return bcadd($num,$y2);
    }
    
    /*function encrypt( $num, $GETn){
        if ( file_exists( 'temp/bigprimes'.hash( 'sha256', $GETn).'.php')){
            $t= explode( '>,', file_get_contents('temp/bigprimes'.hash( 'sha256', $GETn).'.php'));
            return $this->JL_powmod( $num, $t[4], $t[10]); 
        }else{
            return false;
        }
    }
     
    function decrypt( $num, $GETn){
        if ( file_exists( 'temp/bigprimes'.hash( 'sha256', $GETn).'.php')){
            $t= explode( '>,', file_get_contents('temp/bigprimes'.hash( 'sha256', $GETn).'.php'));
            return $this->JL_powmod( $num, $t[8], $t[10]);     
        }else{
            return false;
        }
    }*/
     
    // Tính ($num^$pow) % (%mod) 
    /*function JL_powmod( $num, $pow, $mod) {
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
    }*/
     
    //Chuyển đổi từ cơ sở này sang cơ sở khác
    function baseToBase ($message, $fromBase, $toBase){
        $from= strlen( $fromBase);
        $b[$from]= $fromBase; 
        $to= strlen( $toBase);
        $b[$to]= $toBase; 
     
        $result= substr( $b[$to], 0, 1);
     
        $f= substr( $b[$to], 1, 1);
     
        $tf= $this->digit( $from, $b[$to]);
     
        for ($i=strlen($message)-1; $i>=0; $i--){
            $result= $this->badd( $result, $this->bmul( $this->digit( strpos( $b[$from], substr( $message, $i, 1)), $b[$to]), $f, $b[$to]), $b[$to]);
            $f= $this->bmul($f, $tf, $b[$to]);
        }
        return $result; 
    } 
     
    function digit( $from, $bto){   
        $to= strlen( $bto);
        $b[$to]= $bto; 
     
        $t[0]= intval( $from);
        $i= 0;
        while ( $t[$i] >= intval( $to)){
            if ( !isset( $t[$i+1])){ 
                $t[$i+1]= 0;
            }
            while ( $t[$i] >= intval( $to)){
                $t[$i]= $t[$i] - intval( $to);
                $t[$i+1]++;
            }
            $i++;
        }
     
        $res= '';
        for ( $i=count( $t)-1; $i>=0; $i--){ 
            $res.= substr( $b[$to], $t[$i], 1);
        }
        return $res;
    }   
    
    // Cộng $n1 với $n2
    function badd( $n1, $n2, $nbase){
        $base= strlen( $nbase);
        $b[$base]= $nbase; 
     
        while ( strlen( $n1) < strlen( $n2)){
            $n1= substr( $b[$base], 0, 1) . $n1;
        }
        while ( strlen( $n1) > strlen( $n2)){
            $n2= substr( $b[$base], 0, 1) . $n2;
        }
        $n1= substr( $b[$base], 0, 1) . $n1;    
        $n2= substr( $b[$base], 0, 1) . $n2;
        $m1= array();
        for ( $i=0; $i<strlen( $n1); $i++){
            $m1[$i]= strpos( $b[$base], substr( $n1, (strlen( $n1)-$i-1), 1));
        }   
        $res= array();
        $m2= array();
        for ($i=0; $i<strlen( $n1); $i++){
            $m2[$i]= strpos( $b[$base], substr( $n2, (strlen( $n1)-$i-1), 1));
            $res[$i]= 0;
        }           
        for ($i=0; $i<strlen( $n1)  ; $i++){
            $res[$i]= $m1[$i] + $m2[$i] + $res[$i];
            if ($res[$i] >= $base){
                $res[$i]= $res[$i] - $base;
                $res[$i+1]++;
            }
        }
        $o= '';
        for ($i=0; $i<strlen( $n1); $i++){
            $o= substr( $b[$base], $res[$i], 1).$o;
        }   
        $t= false;
        $o= '';
        for ($i=strlen( $n1)-1; $i>=0; $i--){
            if ($res[$i] > 0 || $t){    
                $o.= substr( $b[$base], $res[$i], 1);
                $t= true;
            }
        }
        return $o;
    }
    
    //Nhân $n1 với $n2
    function bmul( $n1, $n2, $nbase){
        $base= strlen( $nbase);
        $b[$base]= $nbase; 
     
        $m1= array();
        for ($i=0; $i<strlen( $n1); $i++){
            $m1[$i]= strpos( $b[$base], substr($n1, (strlen( $n1)-$i-1), 1));
        }   
        $m2= array();
        for ($i=0; $i<strlen( $n2); $i++){
            $m2[$i]= strpos( $b[$base], substr($n2, (strlen( $n2)-$i-1), 1));
        }           
        $res= array();
        for ($i=0; $i<strlen( $n1)+strlen( $n2)+2; $i++){
            $res[$i]= 0;
        }
        for ($i=0; $i<strlen( $n1)  ; $i++){
            for ($j=0; $j<strlen( $n2)  ; $j++){
                $res[$i+$j]= ($m1[$i] * $m2[$j]) + $res[$i+$j];
                while ( $res[$i+$j] >= $base){
                    $res[$i+$j]= $res[$i+$j] - $base;
                    $res[$i+$j+1]++;
                }
            }
        }
        $t= false;
        $o= '';
        for ($i=count( $res)-1; $i>=0; $i--){
            if ($res[$i]>0 || $t){  
                $o.= substr( $b[$base], $res[$i], 1);
                $t= true;
            }
        }
        return $o;
    }

}
?>