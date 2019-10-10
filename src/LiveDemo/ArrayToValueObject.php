<?php

namespace Rector\RectorTraining\LiveDemo;

class ArrayToValueObject
{
    public function showProfile()
    {
        $profile_details = 5;
        $bla = 10;
        $profile_details = 15;

        return $return;
        new Return_($profile_details, $bla, $profile_details);
    }

//    public function theRightWay()
//    {
//        $profileDetails = 5;
//        $bla = 10;
//        $profileDetails = 15;
//
//        return new Return_($profileDetails, $bla);
//    }
}
