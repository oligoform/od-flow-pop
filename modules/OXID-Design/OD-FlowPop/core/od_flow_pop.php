<?php
/*
//(C) OXID-Design 2015
//
// The source contained in this file is the property of the OXID-Design
// (Leipziger Allee 36, 76139 Karlsruhe, Germany, www.oxid-design.com).
//
// GNU GENERAL PUBLIC LICENSE
//
//This program is free software;
//you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
//either version 3 of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
//without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
// You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
*/

class od_flow_pop extends od_flow_pop_parent {
    public static function addPopForFlow(){
        $oConfig = oxRegistry::getConfig();
        $sqlFile = $oConfig->getModulesDir().'OXID-Design/OD-FlowPop/sql/od_flow_pop.sql';
        $sSql = file_get_contents($sqlFile);
        oxDb::getDb()->execute($sSql);
    }
    public static function rmPopForFlow(){
        $sSql = "DELETE FROM `oxcontents` WHERE `OXID` IN ('odflowpop')";

        oxDb::getDb()->execute( $sSql );
    }
    public static function onActivate(){
        self::addPopForFlow();
    }
    public static function onDeactivate(){
        self::rmPopForFlow();
    }
}
