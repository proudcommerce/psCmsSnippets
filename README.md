psCmsSnippets
=========

Setting for CMS pages, which may not be accessible via browser.
Free Module for OXID eShop.

Features

	- checkbox on each cms-page for disabling
	- if disabled redirect with header 400 to shop start page


Installation

	1. copy content from copy_this folder into your shop root
	2. copy content from changed_full folder into your shop root (and/or customize)
	3. install sql (see below) and update views (shop admin --> service --> tools)
	4. activate module psCmsSnippets in shop admin


Install SQL

	ALTER TABLE  `oxcontents` ADD  `PSCMSSNIPPETS_DISABLE` TINYINT( 1 ) NOT NULL;


License

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    

Copyright

	Proud Sourcing GmbH 2013
	www.proudcommerce.com
