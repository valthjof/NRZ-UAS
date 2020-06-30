<?php
function strToBin($input)
{
    if (!is_string($input))
        return false;
    $input = unpack('H*', $input);
    $chunks = str_split($input[1], 2);
    $ret = '';
    foreach ($chunks as $key => $chunk)
    {
        $temp = base_convert($chunk, 16, 2);
        $repeat = str_repeat("0", 8 - strlen($temp)) . $temp;
        $ret .= $repeat;
    }
    return $ret;
}

function binToNrz($kata2)
{
    $binary = strToBin($kata2);
    $array_binary = str_split($binary, 4);
    $bilangan_dump = 0;
    $dump_binary = null;
    $hasil = '';
    foreach ($array_binary as $key => $value) {
        $angka = bindec($value);
        if($angka > $bilangan_dump || $angka == $bilangan_dump){
            $dump_binary = 1;
        } else {
            $dump_binary = 0;
        }
        $bilangan_dump = $angka;
        $hasil .= $dump_binary;
    }
    return $hasil;
}

echo "Masukan Kata - Kata : ";
$kata2 = trim(fgets(STDIN));
$hasil = binToNrz($kata2);

echo "Hasil => " . $hasil;