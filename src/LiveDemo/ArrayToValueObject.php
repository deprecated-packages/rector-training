<?php

namespace Rector\RectorTraining\LiveDemo;

class ArrayToValueObject
{
    public function showProfile()
    {
        $return['profile_details'] = 5;
        $return['bla'] = 10;
        $return['profile_details'] = 15;

        return $return;
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
