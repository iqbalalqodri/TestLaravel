<?php

//1.Buatlah sebuah PHP script untuk menentukan (1) nilai rata-rata, (2) 7 nilai tertinggi, (3) 7 nilai terendah dari nilai-nilai di atas.
echo "1. Buatlah sebuah PHP script untuk menentukan (1) nilai rata-rata, (2) 7 nilai tertinggi, (3) 7 nilai terendah dari nilai-nilai di atas.";
echo "<br>";
$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$arr = explode(" ", $nilai);

echo '<br>';
echo 'Nilai Rata-Rata :';
$a = array_filter($arr);
$average = array_sum($arr)/count($arr);
echo $average;

asort($arr, SORT_NUMERIC);
echo '<pre>';
echo '7 Nilai Tertinggi ';
print_r(array_slice($arr, -7, 7, true));
echo '</pre>';

asort($arr, SORT_NUMERIC);
echo '<pre>';
echo '7 Nilai Terendah ';

print_r(array_slice($arr, 0, 7, true));
echo '</pre>';


//2. Buatlah sebuah fungsi dalam PHP untuk menentukan jumlah huruf kecil dalam sebuah string.
echo "2. Buatlah sebuah fungsi dalam PHP untuk menentukan jumlah huruf kecil dalam sebuah string.";
echo "<br>";
echo "<br>";


 function jumlah_huruf_kecil($input)
{
	echo " output : ".$input;
}

$input = jumlah_huruf_kecil("TranSISI");


echo "<br>";
echo "<br>";

// Buatlah sebuah fungsi dalam PHP untuk membentuk unigram, bigram, trigram dari sebuah string.
echo "3. Buatlah sebuah fungsi dalam PHP untuk membentuk unigram, bigram, trigram dari sebuah string.";
echo "<br>";
echo "<br>";
function fungsiubt($input)
	{
		$array_input = explode(' ', $input);

		// unigram
		$unigram = '';
		foreach ($array_input as $data) {
			$unigram .= $data.', ';
		}
		$unigram = substr($unigram, 0, -2);

		// bigram
		$i = 0;
		$bigram = '';
		foreach ($array_input as $data) {
			if ($i < 1) {
				$bigram .= $data.' ';
				$i++;
			} else {
				$bigram .= $data.', ';
				$i = 0;
			}
		}
		$bigram = substr($bigram, 0, -2);

		// trigram
		$i = 0;
		$trigram = '';
		foreach ($array_input as $data) {
			if ($i < 2) {
				$trigram .= $data.' ';
				$i++;
			} else {
				$trigram .= $data.', ';
				$i = 0;
			}
		}
		$trigram = substr($trigram, 0, -2);


		$result = 'Unigram : '. $unigram . '<br>';
		$result .= 'Bigram : '. $bigram . '<br>';
		$result .= 'Trigram : '. $trigram;

		return $result;
	}

	echo fungsiubt('Palembang adalah ibu kota provinsi Sumatra Selatan');
  
	// Unigram : Jakarta, adalah, ibukota, negara, Republik, Indonesia
	// Bigram : Jakarta adalah, ibukota negara, Republik Indonesia
	// Trigram : Jakarta adalah ibukota, negara Republik Indonesia
?>