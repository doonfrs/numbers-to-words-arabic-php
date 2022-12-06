<?php

class NumberToWords
{

    public static function convertNumberAr(
        $number,
        $currency = null,
        $currencyPlural = null,
        $currencyFraction = null,
        $currencyFractionPlural = null
    ) {
        if (($number < 0) || ($number > 999999999999)) {
            throw new Exception("Out of range");
        }

        $numParts = explode('.', (string) $number);
        $return = "";
        for ($p = 0; $p < count($numParts); $p++) {
            $num = $numParts[$p];
            if ($p == 1) {
                if (strlen($num) > 2) {
                    $num = substr($num, 0, 2);
                }
                $num = (float) $num;

                $return .= "، و";
            }
            //convert number into array of (string) number each case
            // -------number: 121210002876-----------//
            //  0       1       2       3  //
            //121   210   002   876
            $english_format_number = number_format($num);
            $array_number = explode(',', $english_format_number);
            //convert each number(hundred) to arabic
            for ($i = 0; $i < count($array_number); $i++) {
                $place = count($array_number) - $i;
                $return .= self::convertAr((int)$array_number[$i], $place);
                if (isset($array_number[($i + 1)]) && $array_number[($i + 1)] > 0) {
                    $return .= ' و';
                }
            }

            if ($p == 0 && $currency) {
                if ($num == 1) {
                    $return = "$currency $return";
                } else {
                    if ($num > 2 && $num <= 10) {
                        $return = "$return $currencyPlural";
                    } else {
                        $return = "$return $currency";
                    }
                }
            } elseif ($p == 1 && $currencyFraction) {
                if ($num > 2 && $num <= 10) {
                    $return = "$return $currencyFractionPlural";
                } else {
                    $return = "$return $currencyFraction";
                }
            }
        }


        return $return;
    }
    //private function
    private static function convertAr($number, $place)
    {
        // take in charge the sex of NUMBERED
        //the number word in arabic for masculine and feminine
        $words = array(
            'male' => array(
                0 => '', 1 => 'واحد', 2 => 'اثنان', 3 => 'ثلاثة', 4 => 'أربعة', 5 => 'خمسة',
                6 => 'ستة', 7 => 'سبعة', 8 => 'ثمانية', 9 => 'تسعة', 10 => 'عشرة',
                11 => 'أحد عشر', 12 => 'اثنا عشر', 13 => 'ثلاثة عشر', 14 => 'أربعة عشر',
                15 => 'خمسة عشر',
                16 => 'ستة عشر', 17 => 'سبعة عشر', 18 => 'ثمانية عشر',
                19 => 'تسعة عشر', 20 => 'عشرون',
                30 => 'ثلاثون', 40 => 'أربعون', 50 => 'خمسون', 60 => 'ستون', 70 => 'سبعون',
                80 => 'ثمانون', 90 => 'تسعون', 100 => 'مئة', 200 => 'مئتان', 300 => 'ثلاثمئة',
                400 => 'أربعمئة', 500 => 'خمسمئة',
                600 => 'ستمئة', 700 => 'سبعمئة', 800 => 'ثمانمئة', 900 => 'تسعمئة'
            ),
            'female' => array(
                0 => '', 1 => 'واحدة', 2 => 'اثنتان', 3 => 'ثلاث', 4 => 'أربع', 5 => 'خمس',
                6 => 'ست', 7 => 'سبع', 8 => 'ثمان', 9 => 'تسع', 10 => 'عشر',
                11 => 'إحدى عشرة', 12 => 'ثنتا عشرة', 13 => 'ثلاث عشرة',
                14 => 'أربع عشرة', 15 => 'خمس عشرة',
                16 => 'ست عشرة', 17 => 'سبع عشرة', 18 => 'ثمان عشرة',
                19 => 'تسع عشرة', 20 => 'عشرون',
                30 => 'ثلاثون', 40 => 'أربعون', 50 => 'خمسون', 60 => 'ستون', 70 => 'سبعون',
                80 => 'ثمانون', 90 => 'تسعون', 100 => 'مئة', 200 => 'مئتان',
                300 => 'ثلاثمئة', 400 => 'أربعمئة', 500 => 'خمسمئة',
                600 => 'ستمئة', 700 => 'سبعمئة', 800 => 'ثمانمئة', 900 => 'تسعمئة'
            )
        );

        $mf = array(1 => 'male', 2 => 'male', 3 => 'male', 4 => 'male');
        $number_length = strlen((string)$number);
        $numberStr = (string)$number;

        if ($number == 0) {
            return '';
        } elseif ($numberStr[0] == 0) {
            if ($numberStr[1] == 0) {
                $number = (int)substr($number, -1);
            } else {
                $number = (int)substr($number, -2);
            }
        }
        switch ($number_length) {
            case 1:
                switch ($place) {
                    case 1:
                        $return = $words[$mf[$place]][$number];
                        break;
                    case 2:
                        if (($number) == 1) {
                            $return = 'ألف';
                        } elseif ($number == 2) {
                            $return = 'ألفان';
                        } else {
                            $return = $words[$mf[$place]][$number] . ' آلاف';
                        }

                        break;
                    case 3:
                        if ($number == 1) {
                            $return = 'مليون';
                        } elseif ($number == 2) {
                            $return = 'مليونان';
                        } else {
                            $return = $words[$mf[$place]][$number] . ' ملايين';
                        }

                        break;
                    case 4:
                        if ($number == 1) {
                            $return = 'مليار';
                        } elseif ($number == 2) {
                            $return = 'ملياران';
                        } else {
                            $return = $words[$mf[$place]][$number] . ' مليارات';
                        }

                        break;
                }

                break;
            case 2:
                if (isset($words[$mf[$place]][$number])) {
                    $return = $words[$mf[$place]][$number];
                } else {
                    $twoy = $numberStr[0] * 10;
                    $ony = $numberStr[1];
                    $return = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
                }
                switch ($place) {
                    case 2:
                        if ($number >= 3 and $number <= 10) {
                            $return .= ' آلاف';
                        } else {
                            $return .= ' ألف';
                        }

                        break;
                    case 3:
                        if ($number >= 3 and $number <= 10) {
                            $return .= ' ملايين';
                        } else {
                            $return .= ' مليون';
                        }

                        break;
                    case 4:
                        if ($number >= 3 and $number <= 10) {
                            $return .= ' مليارات';
                        } else {
                            $return .= ' مليار';
                        }

                        break;
                }

                break;
            case 3:
                if (isset($words[$mf[$place]][$number])) {
                    $return = $words[$mf[$place]][$number];
                    if ($number == 200) {
                        $return = 'مئتا';
                    }
                    switch ($place) {
                        case 2:
                            $return .= ' ألف';

                            break;
                        case 3:
                            $return .= ' مليون';

                            break;
                        case 4:
                            $return .= ' مليار';

                            break;
                    }
                    return $return;
                } else {
                    $threey = $numberStr[0] * 100;
                    if (isset($words[$mf[$place]][$threey])) {
                        $return = $words[$mf[$place]][$threey];
                    }
                    $twoyony = $numberStr[1] * 10 + $numberStr[2];
                    if ($twoyony == 2) {
                        switch ($place) {
                            case 1:
                                $twoyony = $words[$mf[$place]][2];
                                break;
                            case 2:
                                $twoyony = 'ألفان';
                                break;
                            case 3:
                                $twoyony = 'مليونان';
                                break;
                            case 4:
                                $twoyony = 'ملياران';
                                break;
                        }
                        if ($threey != 0) {
                            $twoyony = 'و' . $twoyony;
                        }
                        $return = $return . ' ' . $twoyony;
                    } elseif ($twoyony == 1) {
                        switch ($place) {
                            case 1:
                                $twoyony = $words[$mf[$place]][1];
                                break;
                            case 2:
                                $twoyony = 'ألف';
                                break;
                            case 3:
                                $twoyony = 'مليون';
                                break;
                            case 4:
                                $twoyony = 'مليار';
                                break;
                        }
                        if ($threey != 0) {
                            $twoyony = 'و' . $twoyony;
                        }
                        $return = $return . ' ' . $twoyony;
                    } else {
                        if (isset($words[$mf[$place]][$twoyony])) {
                            $twoyony = $words[$mf[$place]][$twoyony];
                        } else {
                            $twoy = $numberStr[1] * 10;
                            $ony = $numberStr[2];
                            $twoyony = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
                        }
                        if ($twoyony != '' && $threey != 0) {
                            $return = $return . ' و' . $twoyony;
                        }
                        switch ($place) {
                            case 2:
                                $return .= ' ألف';

                                break;
                            case 3:
                                $return .= ' مليون';

                                break;
                            case 4:
                                $return .= ' مليار';

                                break;
                        }
                    }
                }
                break;
        }


        return $return;
    }
}
