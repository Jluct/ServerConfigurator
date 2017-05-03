<?php

/*
types:
    string - complete string of parameters
    time - in seconds/minutes/hours, etc
    rule - access rules
    radio - on/off
    size - in bytes (K, M, etc)
    list - list of predefined variables
    list-n-rule - list with rules
    integer - count of

    первое - раздел
    второе - пункт раздела
    третье - тип данных
    четвёртое - дефолтное значение, взято из дефолтного конфига

 */

$config[AUTHENTICATION][auth_param][string] = "none";
$config[AUTHENTICATION][authenticate_cache_garbage_interval][time] = "1 hour";
$config[AUTHENTICATION][authenticate_ttl][time] = "1 hour";
$config[AUTHENTICATION][authenticate_ip_ttl][time] = "1 second";

$config[ACCESS][external_acl_type][string] = "none";
$config[ACCESS][acl][rule] = "";
$config[ACCESS][follow_x_forwarded_for][rule] = "";
$config[ACCESS][acl_uses_indirect_client][radio] = "on";
$config[ACCESS][delay_pool_uses_indirect_client][radio] = "on";
$config[ACCESS][log_uses_indirect_client][radio] = "on";
$config[ACCESS][tproxy_uses_indirect_client][radio] = "off";
$config[ACCESS][spoof_client_ip_allow][rule] = "";
$config[ACCESS][http_access][rule] = "";
$config[ACCESS][adapted_http_access][rule] = "";
$config[ACCESS][http_reply_access][rule] = "";
$config[ACCESS][icp_access][rule] = "";
$config[ACCESS][htcp_access][rule] = "";
$config[ACCESS][htcp_clr_access][rule] = "";
$config[ACCESS][miss_access][rule] = "";
$config[ACCESS][ident_lookup_access][rule] = "";
$config[ACCESS][reply_body_max_size][size] = "none";

$config[NETWORK][http_port][string] = "none";
$config[NETWORK][https_port][string] = "none";
$config[NETWORK][tcp_outgoing_tos][rule] = "";
$config[NETWORK][clientside_tos][rule] = "";
$config[NETWORK][tcp_outgoing_mark][rule] = "";
$config[NETWORK][qos_flows][string] = "none";
$config[NETWORK][tcp_outgoing_mark][rule] = "";
$config[NETWORK][host_verify_strict][radio] = "off";
$config[NETWORK][client_dst_passthru][radio] = "on";

$config[SSL][ssl_unclean_shutdown][radio] = "off";
$config[SSL][ssl_engine][string] = "none";
$config[SSL][sslproxy_client_certificate][string] = "none";
$config[SSL][sslproxy_client_key][string] = "none";
$config[SSL][sslproxy_version][string] = "automatic";
$config[SSL][sslproxy_options][string] = "none";
$config[SSL][sslproxy_cipher][string] = "none";
$config[SSL][sslproxy_cafile][string] = "none";
$config[SSL][sslproxy_capath][string] = "none";
$config[SSL][ssl_bump][rule] = "";
$config[SSL][sslproxy_flags]['list'] = "none";
$config[SSL][sslproxy_cert_error][rule] = "";
$config[SSL][sslproxy_cert_sign]['list-n-rule'] = "none";
$config[SSL][sslproxy_cert_adapt]['list-n-rule'] = "none";
$config[SSL][sslpassword_program][string] = "none";

$config[EXTERNAL_SSL_CRTD][sslcrtd_program][string] = "/usr/local/squid/libexec/ssl_crtd -s /usr/local/squid/var/lib/ssl_db -M 4MB";
$config[EXTERNAL_SSL_CRTD][sslcrtd_children][string] = "32 startup=5 idle=1";
$config[EXTERNAL_SSL_CRTD][sslcrtvalidator_program][string] = "none";
$config[EXTERNAL_SSL_CRTD][sslcrtvalidator_children][string] = "32 startup=5 idle=1 concurrency=1";

$config[NEIGHBOR_SELECTION_ALGORITHM][cache_peer][string] = "none";
$config[NEIGHBOR_SELECTION_ALGORITHM][cache_host_domain][string] = "none";
$config[NEIGHBOR_SELECTION_ALGORITHM][cache_peer_access][rule] = "";
$config[NEIGHBOR_SELECTION_ALGORITHM][neighbor_type_domain][string] = "";
$config[NEIGHBOR_SELECTION_ALGORITHM][dead_peer_timeout][time] = "10 seconds";
$config[NEIGHBOR_SELECTION_ALGORITHM][forward_max_tries][integer] = "10";
$config[NEIGHBOR_SELECTION_ALGORITHM][hierarchy_stoplist][string] = "none";

$config[MEMORY_CACHE][cache_mem][size] = "256 MB";
$config[MEMORY_CACHE][maximum_object_size_in_memory][size] = "512 KB";
$config[MEMORY_CACHE][memory_cache_shared][radio] = "off";
$config[MEMORY_CACHE][memory_cache_mode]['list'] = "";
$config[MEMORY_CACHE][memory_replacement_policy]['list'] = "lru";

$config[DISK_CACHE][cache_replacement_policy]['list'] = "lru";
$config[DISK_CACHE][minimum_object_size][size] = "0 KB";
$config[DISK_CACHE][maximum_object_size][size] = "4 MB";
$config[DISK_CACHE][cache_dir][string] = "";
$config[DISK_CACHE][store_dir_select_algorithm]['list'] = "least-load";
$config[DISK_CACHE][max_open_disk_fds][integer] = "0";
$config[DISK_CACHE][cache_swap_low][integer] = "90";
$config[DISK_CACHE][cache_swap_high][integer] = "95";

$config[LOGFILE][logformat][string] = ""; /* maybe type string-lists - string and multiply lists ??? */
$config[LOGFILE][access_log][string] = "daemon:/usr/local/squid/var/logs/access.log squid";
$config[LOGFILE][icap_log][string] = "none"; /* maybe type string-lists - string and multiply lists ??? */
$config[LOGFILE][logfile_daemon][string] = "/usr/local/squid/libexec/log_file_daemon";
$config[LOGFILE][stats_collection][rule] = "";
$config[LOGFILE][cache_store_log][string] = "none";
$config[LOGFILE][cache_swap_state][string] = "";
$config[LOGFILE][logfile_rotate][integer] = "10";
$config[LOGFILE][mime_table][string] = "/usr/local/squid/etc/mime.conf";
$config[LOGFILE][log_mime_hdrs][radio] = "off";
$config[LOGFILE][pid_filename][string] = "/usr/local/squid/var/run/squid.pid";
$config[LOGFILE][client_netmask][string] = "";
$config[LOGFILE][strip_query_terms][radio] = "on";
$config[LOGFILE][buffered_logs][radio] = "off";
$config[LOGFILE][netdb_filename][string] = "stdio:/usr/local/squid/var/logs/netdb.state";

$config[TROUBLESHOOTING][cache_log][string] = "/usr/local/squid/var/logs/cache.log";
$config[TROUBLESHOOTING][debug_options][string] = "ALL,1";
$config[TROUBLESHOOTING][coredump_dir][string] = "/usr/local/squid/var/cache/squid";

$config[FTP_GATEWAYING][ftp_user][string] = "Squid@";
$config[FTP_GATEWAYING][ftp_passive][radio] = "on";
$config[FTP_GATEWAYING][ftp_epsv_all][radio] = "off";
$config[FTP_GATEWAYING][ftp_epsv][radio] = "on";
$config[FTP_GATEWAYING][ftp_eprt][radio] = "on";
$config[FTP_GATEWAYING][ftp_sanitycheck][radio] = "on";
$config[FTP_GATEWAYING][ftp_telnet_protocol][radio] = "on";

$config[EXTERNAL_SUPPORT_PROGRAMS][diskd_program][string] = "/usr/local/squid/libexec/diskd";
$config[EXTERNAL_SUPPORT_PROGRAMS][unlinkd_program][string] = "/usr/local/squid/libexec/unlinkd";
$config[EXTERNAL_SUPPORT_PROGRAMS][pinger_program][string] = "/usr/local/squid/libexec/pinger";
$config[EXTERNAL_SUPPORT_PROGRAMS][pinger_enable][radio] = "on";

$config[URL_REWRITING][url_rewrite_program][string] = "none";
$config[URL_REWRITING][url_rewrite_children][string] = "20 startup=0 idle=1 concurrency=0";
$config[URL_REWRITING][url_rewrite_host_header][radio] = "on";
$config[URL_REWRITING][url_rewrite_access][rule] = "";
$config[URL_REWRITING][url_rewrite_bypass][radio] = "off";

$config[STORE_ID][store_id_program][string] = "none";
$config[STORE_ID][store_id_children][string] = "20 startup=0 idle=1 concurrency=0";
$config[STORE_ID][store_id_access][rule] = "";
$config[STORE_ID][store_id_bypass][radio] = "on";

$config[TUNING_THE_CACHE][cache][rule] = "";
$config[TUNING_THE_CACHE][max_stale][time] = "1 week";
$config[TUNING_THE_CACHE][refresh_pattern][string] = "none";
$config[TUNING_THE_CACHE][quick_abort_min][size] = "16 KB";
$config[TUNING_THE_CACHE][quick_abort_max][size] = "16 KB";
$config[TUNING_THE_CACHE][quick_abort_pct][integer] = "95";
$config[TUNING_THE_CACHE][read_ahead_gap][size] = "16 KB";
$config[TUNING_THE_CACHE][negative_ttl][time] = "0 seconds";
$config[TUNING_THE_CACHE][positive_dns_ttl][time] = "6 hours";
$config[TUNING_THE_CACHE][negative_dns_ttl][time] = "1 minutes";
$config[TUNING_THE_CACHE][range_offset_limit][rule] = "";
$config[TUNING_THE_CACHE][minimum_expiry_time][time] = "60 seconds";
$config[TUNING_THE_CACHE][store_avg_object_size][size] = "13 KB";
$config[TUNING_THE_CACHE][store_objects_per_bucket][integer] = "20";

$config[HTTP][request_header_max_size][size] = "64 KB";
$config[HTTP][reply_header_max_size][size] = "64 KB";
$config[HTTP][request_body_max_size][size] = "0 KB";
$config[HTTP][client_request_buffer_max_size][size] = "512 KB";
$config[HTTP][broken_posts][rule] = "";
$config[HTTP][adaptation_uses_indirect_client][radio] = "on";
$config[HTTP][via][radio] = "on";
$config[HTTP][ie_refresh][radio] = "off";
$config[HTTP][vary_ignore_expire][radio] = "off";
$config[HTTP][request_entities][radio] = "off";
$config[HTTP][reply_header_access][rule] = "";
$config[HTTP][request_header_replace][string] = "";
$config[HTTP][request_header_add][string] = "";
$config[HTTP][note][string] = "";
$config[HTTP][relaxed_header_parser][radio] = "on";

$config[TIMEOUTS][forward_timeout][time] = "4 minutes";
$config[TIMEOUTS][connect_timeout][time] = "1 minute";
$config[TIMEOUTS][peer_connect_timeout][time] = "30 seconds";
$config[TIMEOUTS][read_timeout][time] = "15 minutes";
$config[TIMEOUTS][write_timeout][time] = "15 minutes";
$config[TIMEOUTS][request_timeout][time] = "5 minutes";
$config[TIMEOUTS][client_idle_pconn_timeout][time] = "2 minutes";
$config[TIMEOUTS][client_lifetime][time] = "1 day";
$config[TIMEOUTS][half_closed_clients][radio] = "off";
$config[TIMEOUTS][server_idle_pconn_timeout][time] = "1 minute";
$config[TIMEOUTS][ident_timeout][time] = "10 seconds";
$config[TIMEOUTS][shutdown_lifetime][time] = "30 seconds";

$config[ADMINISTRATIVE_PARAMETERS][cache_mgr][string] = "webmaster";
$config[ADMINISTRATIVE_PARAMETERS][mail_from][string] = "none";
$config[ADMINISTRATIVE_PARAMETERS][mail_program][string] = "mail";
$config[ADMINISTRATIVE_PARAMETERS][cache_effective_user][string] = "proxy";
$config[ADMINISTRATIVE_PARAMETERS][cache_effective_group][string] = "";
$config[ADMINISTRATIVE_PARAMETERS][httpd_suppress_version_string][radio] = "off";
$config[ADMINISTRATIVE_PARAMETERS][visible_hostname][string] = "";
$config[ADMINISTRATIVE_PARAMETERS][unique_hostname][string] = "";
$config[ADMINISTRATIVE_PARAMETERS][hostname_aliases][string] = "none";
$config[ADMINISTRATIVE_PARAMETERS][umask][string] = "027";

$config[CACHE_REGISTRATION_SERVICE][announce_period][time] = "";
$config[CACHE_REGISTRATION_SERVICE][announce_host][string] = "tracker.ircache.net";
$config[CACHE_REGISTRATION_SERVICE][announce_file][string] = "none";
$config[CACHE_REGISTRATION_SERVICE][announce_port][string] = "3131";

$config[HTTPD - ACCELERATOR][httpd_accel_surrogate_id][string] = "";
$config[HTTPD - ACCELERATOR][http_accel_surrogate_remote][radio] = "off";
$config[HTTPD - ACCELERATOR][esi_parser][string] = "custom";

$config[DELAY_POOL][delay_pools][integer] = "0";
$config[DELAY_POOL][delay_class][string] = "";
$config[DELAY_POOL][delay_access][rule] = "";
$config[DELAY_POOL][delay_parameters][string] = "";
$config[DELAY_POOL][delay_initial_bucket_level][integer] = "50";
$config[DELAY_POOL][client_delay_pools][integer] = "0";
$config[DELAY_POOL][client_delay_initial_bucket_level][integer] = "50";
$config[DELAY_POOL][client_delay_parameters][string] = "";
$config[DELAY_POOL][client_delay_access][rule] = "";

$config[WCCPv1_AND_WCCPv2][wccp_router][string] = "";
$config[WCCPv1_AND_WCCPv2][wccp2_router][string] = "";
$config[WCCPv1_AND_WCCPv2][wccp_version][integer] = "4";
$config[WCCPv1_AND_WCCPv2][wccp2_rebuild_wait][radio] = "on";
$config[WCCPv1_AND_WCCPv2][wccp2_forwarding_method]['list'] = "gre";
$config[WCCPv1_AND_WCCPv2][wccp2_return_method]['list'] = "gre";
$config[WCCPv1_AND_WCCPv2][wccp2_assignment_method]['list'] = "hash";
$config[WCCPv1_AND_WCCPv2][wccp2_service][string] = "";
$config[WCCPv1_AND_WCCPv2][wccp2_service_info][string] = "none";
$config[WCCPv1_AND_WCCPv2][wccp2_weight][integer] = "10000";
$config[WCCPv1_AND_WCCPv2][wccp_address][string] = "";
$config[WCCPv1_AND_WCCPv2][wccp2_address][string] = "";

$config[PERSISTENT_CONNECTION_HANDLING][client_persistent_connections][radio] = "on";
$config[PERSISTENT_CONNECTION_HANDLING][server_persistent_connections][radio] = "on";
$config[PERSISTENT_CONNECTION_HANDLING][persistent_connection_after_error][radio] = "on";
$config[PERSISTENT_CONNECTION_HANDLING][detect_broken_pconn][radio] = "off";

$config[CACHE_DIGEST][digest_generation][radio] = "on";
$config[CACHE_DIGEST][digest_bits_per_entry][integer] = "5";
$config[CACHE_DIGEST][digest_rebuild_period][time] = "1 hour";
$config[CACHE_DIGEST][digest_rewrite_period][time] = "1 hour";
$config[CACHE_DIGEST][digest_swapout_chunk_size][size] = "4096 bytes";
$config[CACHE_DIGEST][digest_rebuild_chunk_percentage][integer] = "10";

$config[SNMP][snmp_port][string] = "0";
$config[SNMP][snmp_access][rule] = "";
$config[SNMP][snmp_incoming_address][string] = "";
$config[SNMP][snmp_outgoing_address][string] = "";

$config[ICP_and_HTCP][icp_port][string] = "";
$config[ICP_and_HTCP][htcp_port][string] = "";
$config[ICP_and_HTCP][log_icp_queries][radio] = "on";
$config[ICP_and_HTCP][udp_incoming_address][string] = "";
$config[ICP_and_HTCP][icp_hit_stale][radio] = "off";
$config[ICP_and_HTCP][minimum_direct_hops][integer] = "4";
$config[ICP_and_HTCP][minimum_direct_rtt][integer] = "400";
$config[ICP_and_HTCP][netdb_low][integer] = "900";
$config[ICP_and_HTCP][netdb_high][integer] = "1000";
$config[ICP_and_HTCP][netdb_ping_period][time] = "5 minutes";
$config[ICP_and_HTCP][query_icmp][radio] = "off";
$config[ICP_and_HTCP][test_reachability][radio] = "off";
$config[ICP_and_HTCP][icp_query_timeout][integer] = "0";
$config[ICP_and_HTCP][maximum_icp_query_timeout][integer] = "2000";
$config[ICP_and_HTCP][minimum_icp_query_timeout][integer] = "5";
$config[ICP_and_HTCP][background_ping_rate][time] = "10 seconds";

$config[MULTICAST_ICP][mcast_groups][string] = "none";
$config[MULTICAST_ICP][mcast_miss_addr][string] = "";
$config[MULTICAST_ICP][mcast_miss_ttl][integer] = "16";
$config[MULTICAST_ICP][mcast_miss_port][string] = "3135";
$config[MULTICAST_ICP][mcast_miss_encode_key][string] = "XXXXXXXXXXXXXXXX";
$config[MULTICAST_ICP][mcast_icp_query_timeout][integer] = "2000";

$config[INTERNAL_ICON][icon_directory][string] = "/usr/local/squid/share/icons";
$config[INTERNAL_ICON][global_internal_static][radio] = "on";
$config[INTERNAL_ICON][short_icon_urls][radio] = "on";

$config[ERROR_PAGE][short_icon_urls][string] = "";
$config[ERROR_PAGE][error_default_language][string] = "";
$config[ERROR_PAGE][error_log_languages][radio] = "on";
$config[ERROR_PAGE][err_page_stylesheet][string] = "/usr/local/squid/etc/errorpage.css";
$config[ERROR_PAGE][err_html_text][string] = "";
$config[ERROR_PAGE][deny_info][string] = "none";

$config[REQUEST_FORWARDING][nonhierarchical_direct][radio] = "on";
$config[REQUEST_FORWARDING][prefer_direct][radio] = "off";
$config[REQUEST_FORWARDING][cache_miss_revalidate][radio] = "on";
$config[REQUEST_FORWARDING][always_direct][rule] = "";
$config[REQUEST_FORWARDING][never_direct][rule] = "";

$config[ADVANCED_NETWORKING][incoming_udp_average][integer] = "6";
$config[ADVANCED_NETWORKING][incoming_tcp_average][integer] = "4";
$config[ADVANCED_NETWORKING][incoming_dns_average][integer] = "4";
$config[ADVANCED_NETWORKING][min_udp_poll_cnt][integer] = "8";
$config[ADVANCED_NETWORKING][min_tcp_poll_cnt][integer] = "8";
$config[ADVANCED_NETWORKING][min_dns_poll_cnt][integer] = "8";
$config[ADVANCED_NETWORKING][accept_filter][string] = "none";
$config[ADVANCED_NETWORKING][client_ip_max_connections][integer] = "0";
$config[ADVANCED_NETWORKING][tcp_recv_bufsize][string] = "";

$config[ICAP][icap_enable][radio] = "off";
$config[ICAP][icap_connect_timeout][integer] = "0";
$config[ICAP][icap_io_timeout][time] = "";
$config[ICAP][icap_service_failure_limit][string] = "10 in 5 seconds";
$config[ICAP][icap_service_failure_limit][string] = "10 in 5 seconds";
$config[ICAP][icap_service_revival_delay][integer] = "180";
$config[ICAP][icap_preview_enable][radio] = "on";
$config[ICAP][icap_preview_size][size] = "";
$config[ICAP][icap_206_enable][radio] = "on";
$config[ICAP][icap_default_options_ttl][integer] = "60";
$config[ICAP][icap_persistent_connections][radio] = "on";
$config[ICAP][adaptation_send_client_ip][radio] = "off";
$config[ICAP][adaptation_send_username][radio] = "off";
$config[ICAP][icap_client_username_header][string] = "X-Client-Username";
$config[ICAP][icap_client_username_encode][radio] = "off";
$config[ICAP][icap_service][string] = "none";
$config[ICAP][icap_class][string] = "none";
$config[ICAP][icap_access][string] = "deprecated";

$config[eCAP][ecap_enable][radio] = "off";
$config[eCAP][ecap_service][string] = "none";
$config[eCAP][loadable_modules][string] = "none";

$config[MESSAGE_ADAPTATION][adaptation_service_set][string] = "none";
$config[MESSAGE_ADAPTATION][adaptation_service_chain][string] = "none";
$config[MESSAGE_ADAPTATION][adaptation_access][rule] = "";
$config[MESSAGE_ADAPTATION][adaptation_service_iteration_limit][integer] = "16";
$config[MESSAGE_ADAPTATION][adaptation_masterx_shared_names][string] = "none";
$config[MESSAGE_ADAPTATION][adaptation_meta][rule] = "";
$config[MESSAGE_ADAPTATION][icap_retry][rule] = "";
$config[MESSAGE_ADAPTATION][icap_retry_limit][integer] = "0";

$config[DNS][check_hostnames][radio] = "off";
$config[DNS][allow_underscore][radio] = "on";
$config[DNS][cache_dns_program][string] = "/usr/local/squid/libexec/dnsserver";
$config[DNS][dns_children][string] = "32 startup=1 idle=1";
$config[DNS][dns_retransmit_interval][time] = "5 seconds";
$config[DNS][dns_timeout][time] = "30 seconds";
$config[DNS][dns_packet_max][size] = "none";
$config[DNS][dns_defnames][radio] = "off";
$config[DNS][dns_multicast_local][radio] = "off";
$config[DNS][dns_nameservers][string] = "";
$config[DNS][hosts_file][string] = "/etc/hosts";
$config[DNS][append_domain][string] = "";
$config[DNS][ignore_unknown_nameservers][radio] = "on";
$config[DNS][ipcache_size][integer] = "1024";
$config[DNS][ipcache_low][integer] = "90";
$config[DNS][ipcache_high][integer] = "95";
$config[DNS][fqdncache_size][integer] = "1024";

$config[MISCELLANEOUS][configuration_includes_quoted_values][radio] = "off";
$config[MISCELLANEOUS][memory_pools][radio] = "on";
$config[MISCELLANEOUS][memory_pools_limit][size] = "5 MB";
$config[MISCELLANEOUS][forwarded_for]['list'] = "on";
$config[MISCELLANEOUS][cachemgr_passwd][string] = "disable";
$config[MISCELLANEOUS][client_db][radio] = "on";
$config[MISCELLANEOUS][refresh_all_ims][radio] = "off";
$config[MISCELLANEOUS][reload_into_ims][radio] = "off";
$config[MISCELLANEOUS][connect_retries][integer] = "0";
$config[MISCELLANEOUS][as_whois_server][string] = "whois.ra.net";
$config[MISCELLANEOUS][offline_mode][radio] = "off";
$config[MISCELLANEOUS][uri_whitespace]['list'] = "strip";
$config[MISCELLANEOUS][chroot][string] = "none";
$config[MISCELLANEOUS][balance_on_multiple_ip][radio] = "off";
$config[MISCELLANEOUS][pipeline_prefetch][integer] = "0";
$config[MISCELLANEOUS][high_response_time_warning][integer] = "0";
$config[MISCELLANEOUS][high_page_fault_warning][integer] = "0";
$config[MISCELLANEOUS][high_memory_warning][integer] = "0";
$config[MISCELLANEOUS][sleep_after_fork][integer] = "0";
$config[MISCELLANEOUS][windows_ipaddrchangemonitor][radio] = "on";
$config[MISCELLANEOUS][eui_lookup][radio] = "on";
$config[MISCELLANEOUS][max_filedescriptors][integer] = "65536";
$config[MISCELLANEOUS][workers][integer] = "1";
$config[MISCELLANEOUS][cpu_affinity_map][string] = "";









