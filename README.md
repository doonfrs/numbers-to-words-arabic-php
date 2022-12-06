# NumberToWords in Arabic for PHP

I have the class already from here: https://www.ar-php.org/ar-example-Numbers-php-arabic.html
* I added the currency / fraction
* Better support for single / plural
* Fixed some bugs

Still need to work on feminine rules, also in arabic sometimes you need to switch the currency / number position like هللة واحدة instead of واحد هللة but it is till readable and correct.
If you used the code and you made any optimization, kindly fork / request merge.


```php
echo (NumberToWords::convertNumberAr(1, 'ريال','ريالات','هللة','هللات')); // => 'ريال سعودي واحد
echo (NumberToWords::convertNumberAr(2, 'ريال','ريالات','هللة','هللات')); // => 'اثنان ريال سعودي
echo (NumberToWords::convertNumberAr(3, 'ريال','ريالات','هللة','هللات')); // => 'ثلاثة ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(4, 'ريال','ريالات','هللة','هللات')); // => 'أربعة ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(5, 'ريال','ريالات','هللة','هللات')); // => 'خمسة ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(6, 'ريال','ريالات','هللة','هللات')); // => 'ستة ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(7, 'ريال','ريالات','هللة','هللات')); // => 'سبعة ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(8, 'ريال','ريالات','هللة','هللات')); // => 'ثمانية ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(9, 'ريال','ريالات','هللة','هللات')); // => 'تسعة ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(10, 'ريال','ريالات','هللة','هللات')); // => 'عشرة ريال سعوديات سعودية
echo (NumberToWords::convertNumberAr(11, 'ريال','ريالات','هللة','هللات')); // => 'أحد عشر ريال سعودي
echo (NumberToWords::convertNumberAr(12, 'ريال','ريالات','هللة','هللات')); // => 'اثنا عشر ريال سعودي
echo (NumberToWords::convertNumberAr(13, 'ريال','ريالات','هللة','هللات')); // => 'ثلاثة عشر ريال سعودي
echo (NumberToWords::convertNumberAr(14, 'ريال','ريالات','هللة','هللات')); // => 'أربعة عشر ريال سعودي
echo (NumberToWords::convertNumberAr(15, 'ريال','ريالات','هللة','هللات')); // => 'خمسة عشر ريال سعودي
echo (NumberToWords::convertNumberAr(16, 'ريال','ريالات','هللة','هللات')); // => 'ستة عشر ريال سعودي
echo (NumberToWords::convertNumberAr(17, 'ريال','ريالات','هللة','هللات')); // => 'سبعة عشر ريال سعودي
echo (NumberToWords::convertNumberAr(18, 'ريال','ريالات','هللة','هللات')); // => 'ثمانية عشر ريال سعودي
echo (NumberToWords::convertNumberAr(19, 'ريال','ريالات','هللة','هللات')); // => 'تسعة عشر ريال سعودي
echo (NumberToWords::convertNumberAr(20, 'ريال','ريالات','هللة','هللات')); // => 'عشرون ريال سعودي
echo (NumberToWords::convertNumberAr(21, 'ريال','ريالات','هللة','هللات')); // => 'واحد وعشرون ريال سعودي
echo (NumberToWords::convertNumberAr(100, 'ريال','ريالات','هللة','هللات')); // => 'مئة ريال سعودي
echo (NumberToWords::convertNumberAr(101, 'ريال','ريالات','هللة','هللات')); // => 'مئة وواحد ريال سعودي
echo (NumberToWords::convertNumberAr(111, 'ريال','ريالات','هللة','هللات')); // => 'مئة وأحد عشر ريال سعودي
echo (NumberToWords::convertNumberAr(121, 'ريال','ريالات','هللة','هللات')); // => 'مئة وواحد وعشرون ريال سعودي
echo (NumberToWords::convertNumberAr(200, 'ريال','ريالات','هللة','هللات')); // => 'مئتا ريال سعودي
echo (NumberToWords::convertNumberAr(1.1, 'ريال','ريالات','هللة','هللات')); // => 'ريال سعودي واحد، وواحد هللة
echo (NumberToWords::convertNumberAr(1.2, 'ريال','ريالات','هللة','هللات')); // => 'ريال سعودي واحد، واثنان هللة
echo (NumberToWords::convertNumberAr(1.3, 'ريال','ريالات','هللة','هللات')); // => 'ريال سعودي واحد، وثلاثة هللات
echo (NumberToWords::convertNumberAr(1.42, 'ريال','ريالات','هللة','هللات')); // => 'ريال سعودي واحد، واثنان وأربعون هللة
echo (NumberToWords::convertNumberAr(101.15)); // => 'مئة وواحد ريال سعودي، وخمسة عشر هللة'
echo (NumberToWords::convertNumberAr(101.16)); // => 'مئة وواحد ريال سعودي، وستة عشر هللة'
echo (NumberToWords::convertNumberAr(1001.1)); // => 'ألف وواحد ريال سعودي، وواحد هللة'
echo (NumberToWords::convertNumberAr(1001.2)); // => 'ألف وواحد ريال سعودي، واثنان هللة'
echo (NumberToWords::convertNumberAr(1095.3)); // => 'ألف وخمسة وتسعون ريال سعودي، وثلاثة هللات'
echo (NumberToWords::convertNumberAr(1095.42)); // => 'ألف وخمسة وتسعون ريال سعودي، واثنان وأربعون هللة'
echo (NumberToWords::convertNumberAr(10000)); // => 'عشرة آلاف ريال سعودي'
echo (NumberToWords::convertNumberAr(10001)); // => 'عشرة آلاف وواحد ريال سعودي'
echo (NumberToWords::convertNumberAr(10011)); // => 'عشرة آلاف وأحد عشر ريال سعودي'
echo (NumberToWords::convertNumberAr(11321)); // => 'أحد عشر ألف وثلاثمئة وواحد وعشرون ريال سعودي'
echo (NumberToWords::convertNumberAr(1000000)); // => 'مليون ريال سعودي'
echo (NumberToWords::convertNumberAr(1000000.23)); // => 'مليون ريال سعودي، وثلاثة وعشرون هللة'
echo (NumberToWords::convertNumberAr(1922140.132)); // => 'مليون وتسعمئة واثنان وعشرون ألف ومئة وأربعون ريال سعودي، وثلاثة عشر هللة'

```
