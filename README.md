# NumberToWords in Arabic for PHP

I have the class already from here: https://www.ar-php.org/ar-example-Numbers-php-arabic.html
* I added the currency / fraction
* Better support for single / plural
* Fixed some bugs

Still need to work on feminine rules, also in arabic sometimes you need to switch the currency / number position like هللة واحدة instead of واحد هللة but it is till readable and correct.
If you used the code and you made any optimization, kindly fork / request merge.


```php
echo (NumberToWords::convertNumberAr(1, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ريال سعودي واحد
echo (NumberToWords::convertNumberAr(2, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'اثنان ريال سعودي 
echo (NumberToWords::convertNumberAr(3, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ثلاثة ريالات سعودية
echo (NumberToWords::convertNumberAr(4, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'أربعة ريالات سعودية
echo (NumberToWords::convertNumberAr(5, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'خمسة ريالات سعودية
echo (NumberToWords::convertNumberAr(6, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ستة ريالات سعودية
echo (NumberToWords::convertNumberAr(7, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'سبعة ريالات سعودية
echo (NumberToWords::convertNumberAr(8, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ثمانية ريالات سعودية
echo (NumberToWords::convertNumberAr(9, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'تسعة ريالات سعودية
echo (NumberToWords::convertNumberAr(10, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'عشرة ريالات سعودية
echo (NumberToWords::convertNumberAr(11, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'أحد عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(12, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'اثنا عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(13, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ثلاثة عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(14, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'أربعة عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(15, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'خمسة عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(16, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ستة عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(17, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'سبعة عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(18, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ثمانية عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(19, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'تسعة عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(20, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'عشرون ريال سعودي 
echo (NumberToWords::convertNumberAr(21, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'واحد وعشرون ريال سعودي 
echo (NumberToWords::convertNumberAr(100, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'مئة ريال سعودي 
echo (NumberToWords::convertNumberAr(101, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'مئة وواحد ريال سعودي 
echo (NumberToWords::convertNumberAr(111, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'مئة وأحد عشر ريال سعودي 
echo (NumberToWords::convertNumberAr(121, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'مئة وواحد وعشرون ريال سعودي 
echo (NumberToWords::convertNumberAr(200, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'مئتا ريال سعودي 
echo (NumberToWords::convertNumberAr(1.1, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ريال سعودي واحد، وواحد هللة
echo (NumberToWords::convertNumberAr(1.2, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ريال سعودي واحد، واثنان هللة
echo (NumberToWords::convertNumberAr(1.3, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ريال سعودي واحد، وثلاثة هللات
echo (NumberToWords::convertNumberAr(1.42, 'ريال سعودي','ريالات سعودية','هللة','هللات')); // => 'ريال سعودي واحد، واثنان وأربعون هللة
echo (NumberToWords::convertNumberAr(101.15, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'مئة وواحد ريال سعودي ، وخمسة عشر هللة'
echo (NumberToWords::convertNumberAr(101.16, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'مئة وواحد ريال سعودي ، وستة عشر هللة'
echo (NumberToWords::convertNumberAr(1001.1, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'ألف وواحد ريال سعودي ، وواحد هللة'
echo (NumberToWords::convertNumberAr(1001.2, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'ألف وواحد ريال سعودي ، واثنان هللة'
echo (NumberToWords::convertNumberAr(1095.3, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'ألف وخمسة وتسعون ريال سعودي ، وثلاثة هللات'
echo (NumberToWords::convertNumberAr(1095.42, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'ألف وخمسة وتسعون ريال سعودي ، واثنان وأربعون هللة'
echo (NumberToWords::convertNumberAr(10000, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'عشرة آلاف ريال سعودي '
echo (NumberToWords::convertNumberAr(10001, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'عشرة آلاف وواحد ريال سعودي '
echo (NumberToWords::convertNumberAr(10011, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'عشرة آلاف وأحد عشر ريال سعودي '
echo (NumberToWords::convertNumberAr(11321, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'أحد عشر ألف وثلاثمئة وواحد وعشرون ريال سعودي '
echo (NumberToWords::convertNumberAr(1000000, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'مليون ريال سعودي '
echo (NumberToWords::convertNumberAr(1000000.23, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'مليون ريال سعودي ، وثلاثة وعشرون هللة'
echo (NumberToWords::convertNumberAr(1922140.132, 'ريال سعودي', 'ريالات سعودية', 'هللة', 'هللات')); // => 'مليون وتسعمئة واثنان وعشرون ألف ومئة وأربعون ريال سعودي ، وثلاثة عشر هللة'

```
