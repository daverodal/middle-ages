<?php
namespace Wargame\Medieval;
/**
 * Copyright 2015 David Rodal
 * User: David Markarian Rodal
 * Date: 6/14/15
 * Time: 5:37 PM
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


class FacingUnitFactory {
    public static $id = 0;
    public static $injector;

    public static function build($data = false){
        $nUnit =  new FacingUnit($data);
        if ($data === false) {
            $nUnit->id = self::$id++;
        }
        return $nUnit;
    }

    public static function create($unitName,
                                  $unitForceId,
                                  $unitHexagon,
                                  $attackStrength,
                                  $defStrength,
                                  $flankStrength,
                                  $unitMaxMove,
                                  $range,
                                  $unitStatus,
                                  $unitReinforceZoneName,
                                  $unitReinforceTurn,
                                  $nationality = "neutral",
                                  $class = false,
                                  $unitDesig = false,
                                  $facing,
                                  $armorClass,
                                  $bow = false,
                                  $orgStatus = 0,
                                  $numSteps = 2){
        $unit = static::build();
        $unit->set($unitName, $unitForceId, $unitHexagon, $attackStrength, $defStrength, $flankStrength,$range,
            $unitMaxMove, $unitStatus, $unitReinforceZoneName, $unitReinforceTurn,  $nationality, $class, $unitDesig, $facing, $armorClass, $bow, $orgStatus, $numSteps);
        self::$injector->injectUnit($unit);
    }
}