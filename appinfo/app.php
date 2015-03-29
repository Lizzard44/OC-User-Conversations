<?php

/**
* ownCloud - User Conversations
*
* @author Simeon Ackermann
* @copyright 2014 Simeon Ackermann amseon@web.de
* 
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either 
* version 3 of the License, or any later version.
* 
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*  
* You should have received a copy of the GNU Affero General Public 
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
* 
*/

// register model-file
OC::$CLASSPATH['OC_Conversations'] = 'conversations/lib/conversations.php';

// add update script to change the app-icon even when app is not active, TODO: find app-not-active function...!
OCP\Util::addscript('conversations','updateCheck');

// register HOOK change user group
OC_HOOK::connect('OC_User', 'post_addToGroup', 'OC_Conversations', 'changeUserGroup');
OC_HOOK::connect('OC_User', 'post_removeFromGroup', 'OC_Conversations', 'changeUserGroup');

//$l=OC_L10N::get('conversations');
$l = OCP\Util::getL10N('conversations');
OCP\App::addNavigationEntry( array( 
	'id' => 'conversations_index',
	'order' => 5,
	'href' => OCP\Util::linkToRoute('conversations_index'),
	'icon' => OCP\Util::imagePath( 'conversations', 'conversations.svg' ),
	'name' => $l->t('Conversation'),
));