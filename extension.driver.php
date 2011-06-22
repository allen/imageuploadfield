<?php

	Class extension_ImageUploadField extends Extension {

		public function about() {
			return array(
				'name'			=> 'Field: Image Upload',
				'version'		=> '1.0',
				'release-date'	=> '2010-07-12',
				'author'		=> array(
					'name'			=> 'Alistair Kearney',
					'website'		=> 'http://alistairkearney.com',
					'email'			=> 'hi@alistairkearney.com'
				),
				'description'	=> 'Upload field with features specifically for images. Based on the Unique Upload field, which includes unique names using the UNIX timestamps.'
			);
		}

		public function uninstall() {
			$this->_Parent->Database->query("DROP TABLE `tbl_fields_imageupload`");
		}

		public function install() {
			return $this->_Parent->Database->query("CREATE TABLE `tbl_fields_imageupload` (
				`id` int(11) unsigned NOT NULL auto_increment,
				`field_id` int(11) unsigned NOT NULL,
				`destination` varchar(255) NOT NULL,
				`maximum_filesize` int(11) unsigned,
				`maximum_dimension_width` int(3) unsigned,
				`maximum_dimension_height` int(3) unsigned,
				`resize_long_edge_dimension` int(3) unsigned,
				PRIMARY KEY (`id`),
				KEY `field_id` (`field_id`))"
			);
		}

	}
