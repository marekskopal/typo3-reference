#
# Table structure for table 'tx_msreference_domain_model_reference'
#
CREATE TABLE tx_msreference_domain_model_reference (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    title varchar(255) DEFAULT '' NOT NULL,
    subtitle varchar(255) DEFAULT '' NOT NULL,
    navtitle varchar(255) DEFAULT '' NOT NULL,
    important tinyint(1) unsigned DEFAULT '0' NOT NULL,
    url varchar(255) DEFAULT '' NOT NULL,
    category int(11) unsigned DEFAULT '0' NOT NULL,
    param_values int(11) unsigned DEFAULT '0' NOT NULL,
    images int(11) unsigned NOT NULL default '0',
    files int(11) unsigned NOT NULL default '0',
    realization_date bigint NULL DEFAULT NULL,
    gps_latitude varchar(255) DEFAULT '' NOT NULL,
    gps_longitude varchar(255) DEFAULT '' NOT NULL,
    meta_keywords varchar(255) DEFAULT '' NOT NULL,
    meta_description varchar(255) DEFAULT '' NOT NULL,
    perex text NOT NULL,
    text text NOT NULL,
    similar_references int(11) unsigned DEFAULT '0' NOT NULL,
    clients int(11) unsigned DEFAULT '0' NOT NULL,
    current_project tinyint(1) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_msreference_domain_model_category'
#
CREATE TABLE tx_msreference_domain_model_category (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    parent int(11) DEFAULT '0' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    subtitle varchar(255) DEFAULT '' NOT NULL,
    navtitle varchar(255) DEFAULT '' NOT NULL,
    class varchar(255) DEFAULT '' NOT NULL,
    perex text NOT NULL,
    text text NOT NULL,
    images int(11) unsigned NOT NULL default '0',

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_msreference_reference_category_mm'
#
CREATE TABLE tx_msreference_reference_category_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);


#
# Table structure for table 'tx_msreference_domain_model_param'
#
CREATE TABLE tx_msreference_domain_model_param (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    title varchar(255) DEFAULT '' NOT NULL,
    class varchar(255) DEFAULT '' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_msreference_domain_model_paramvalue'
#
CREATE TABLE tx_msreference_domain_model_paramvalue (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    reference int(11) unsigned DEFAULT '0' NOT NULL,

    param int(11) unsigned DEFAULT '0' NOT NULL,
    param_value text NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY language (l10n_parent,sys_language_uid),
    KEY param (param),
    KEY reference (reference)
);

#
# Table structure for table 'tx_msreference_reference_similar_mm'
#
CREATE TABLE tx_msreference_reference_similar_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_msreference_domain_model_client'
#
CREATE TABLE tx_msreference_domain_model_client (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    title varchar(255) DEFAULT '' NOT NULL,
    class varchar(255) DEFAULT '' NOT NULL,
    perex text NOT NULL,
    text text NOT NULL,
    images int(11) unsigned NOT NULL default '0',
    reference int(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_msreference_reference_client_mm'
#
CREATE TABLE tx_msreference_reference_client_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
