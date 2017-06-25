<?php
    
    /**
     *
     *   MasterCMS
     *
     *   Copyright (c) 2017 MasterCMS
     *
     *   @author <Denzel Code>
     *   -------------------------------------------------------------------------
     *   Licensed under the Apache License, Version 2.0 (the "License");
     *   you may not use this file except in compliance with the License.
     *   You may obtain a copy of the License at
     *
     *       http://www.apache.org/licenses/LICENSE-2.0
     *
     *   Unless required by applicable law or agreed to in writing, software
     *   distributed under the License is distributed on an "AS IS" BASIS,
     *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *   See the License for the specific language governing permissions and
     *   limitations under the License.
     *   -------------------------------------------------------------------------
    */

    namespace MasterCMS\Config;

    class Config {

        public $select = array (
            // Web
            'WEB' => [
                'NAME'          =>          'Habbo', // Hotel name
                'TYPE_HTTP'     =>          TYPE_HTTP, // HTTP/HTTPS
                'URL'           =>          URL, // Website Url
                'CLIENT_URL'    =>          TYPE_HTTP . URL . '/web/client', // Client Url
                'LANG'          =>          'ES', // Don't move if you dont't know what you do.
                'HK_LANG'       =>          'ES' // Don't move if you dont't know what you do.
            ],

            // CDNS
            'CDN' => [
                'TYPE_HTTP'     =>          TYPE_HTTP, // HTTP/HTTPS
                'URL'           =>          URL, // Website Url
                'HK'            =>          'Resources/Hk', // Hk web folder
                'RUTE'          =>          MAIN_ROOT . 'Resources', // Styles directory: C:\master\Resources
                'SWF'           => [
                    'TYPE_HTTP'     =>      TYPE_HTTP, // HTTP/HTTPS
                    'URL'           =>      URL, // Website Url
                    'WEB_RUTE'      =>      'Resources/SWF', // SWF web folder
                    'DIR_RUTE'      =>      MAIN_ROOT . 'Resources' . DS . 'SWF', // SWF directory: C:\master\Resources\SWF
                    'WEB_BADGES'    =>      'c_images/album1584', // Badges web folder
                    'DIR_BADGES'    =>      'c_images' . DS . 'album1584', // Badges directory
                    'DIR_MPUS'      =>      'c_images' . DS . 'MPUS', // MPU directory
                    'WEB_MPUS'      =>      'c_images/MPUS', // MPU web folder
                    'FLASH_TEXTS'   =>      'gamedata' . DS . 'external_flash_texts.txt' // Flash texts rute
                ],
            ],

            // Social Networks Login
            'SOCIAL_NETWORKS_LOGIN' => [
                // Get an facebook app on https://developers.facebook.com
                'FACEBOOK'      =>           [
                    'APP_ID'      =>           '1483906851650372', // Facebook app id
                    'APP_SECRET'  =>           '8637d29ae301ade2452c2399f97ca2b0' // Facebook app secret
                ]
            ],

            // Whitelisted Staffs for client
            'WHITE_LIST_STAFFS' => [
                'STATUS' => false, // Enabled?
                'USERS' => 'LxBlack' // Comma separated
            ],

            // Default Configuration
            // Config this before install the DB
            'DEFAULT_DB_CONFIG' => [
                // Web
                'TEMPLATE_NAME'             =>          'Darker', // Default theme name
                'MAINTENANCE'               =>          '0', // Hotel is on maintenance?
                'MAINTENANCE_DESCRIPTION'   =>          '<p>{@name} is comming!</p>', // Maintenance description
                'COLORS'                    =>          '#009688, #4caf50, #6946a7, #2196f3, #e8971e, #ec4134', // Ignore this
                'LOGO'                      =>          'https://habbox.com/text/114/{@name}', // Hotel logo Url
                'HABBO_IMG'                 =>          'http://www.habbo.es/habbo-imaging/avatarimage?figure=', // Don't touch
                // Housekeeping
                'SUPER_USERS'               =>          'LxBlack', // Users with full access: Comma separated
                'MIN_RANK'                  =>          '3, 4, 5, 6, 7, 8, 9', // Ranks with min access
                'MEDIUM_RANK'               =>          '10, 11, 12, 13, 14, 15', // Ranks with medium access
                'MAX_RANK'                  =>          '14, 15, 16, 17', // Ranks with full access
                // Social Networks
                'FACEBOOK'                  =>          'Denzel-Code-249037048887248', // Hotel facebook
                'TWITTER'                   =>          'UbblyServer', // Hotel twitter
                'INSTAGRAM'                 =>          'denzelcode', // Hotel instagram
                // Optional Things          
                'RADIO'                     =>          'http://example.com/radio.mp3' // Hotel radio
            ],

            // PayMents
            'PAYMENTS' => [
                'PAYPAL'         =>      'usubbly@gmail.com' // Put your PayPal email
            ],

            // Register Options
            'USER_REGISTER' => [
                'MAX_ACCOUNTS'   =>      '5', // Register max accounts
                'MOTTO'          =>      'I love MasterCMS :3', // Users default motto
                'CREDITS'        =>      '99999', // Users default credits
                'DUCKETS'        =>      '0', // Users default duckets
                'DIAMONDS'       =>      '0', // Users default diamonds
                'HOME_ROOM'      =>      '0' // Users default home room
            ],

            // MUS Connection
            'MUS' => [
                'STATUS'         =>          false, // True if you wan't to use MUS (Need sockets)
                'HOST'           =>          '127.0.0.1', // MUS host
                'PORT'           =>          '30001', // MUS port
                'INTERNAL'       =>          true, // The emulator is on your device?
                'DIR'           =>          'C:\xampp\htdocs\Debug', // Emulator directory
                'EXE' => 'Blex Server.exe'
            ],

            // Client Connection
            'CLIENT' => [
                'HOST'                      =>          '127.0.0.1', // Emulator host
                'PORT'                      =>          '30000', // Emulator port
                'EXTERNAL_VARIABLES'        =>          'http://localhost/Resources/SWF/gamedata/external_variables.txt',
                'EXTERNAL_FLASH_TEXTS'      =>          'http://localhost/Resources/SWF/gamedata/external_flash_texts.txt',
                'OVERRIDE_TEXTS'            =>          'http://localhost/Resources/SWF/gamedasta/override/external_flash_override_texts.txt',
                'OVERRIDE_VARIABLES'        =>          'http://localhost/Resources/SWF/gamedata/override/external_override_variables.txt',
                'PRODUCTDATA'               =>          'http://localhost/Resources/SWF/gamedata/productdata.txt',
                'FURNIDATA'                 =>          'http://localhost/Resources/SWF/gamedata/furnidata.xml',
                'FIGUREDATA'                =>          'http://localhost/Resources/SWF/gamedata/figuredata.xml',
                'FIGUREMAP'                 =>          'http://localhost/Resources/SWF/gamedata/figuremap.xml',
                'HOTELVIEW_BANNER'          =>          'http://localhost/Resources/SWF/gamedata/supersecret.txt', 
                'FLASH_CLIENT_URL'          =>          'http://localhost/Resources/SWF/gordon/PRODUCTION-201602082203-712976078/',
                'HABBO_SWF'                 =>          'Habbo.swf'
            ],

        );

    }

?>
