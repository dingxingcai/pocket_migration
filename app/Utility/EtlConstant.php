<?php

namespace App\Utility;

class EtlConstant
{
    const REBUILD_PARSE_CARS_FROM_STORAGE = 'etl.parse_car_data.rebuild';
    const DELTA_PARSE_CARS_FROM_STORAGE = 'etl.parse_car_data.delta';
    const MERGE_PARSE_CARS_FROM_STORAGE = 'etl.parse_car_data.merge';

    const REBUILD_PARSE_USER_DATA_FROM_STORAGE = 'etl.parse_user_data.rebuild';
    const DELTA_PARSE_USER_DATA_FROM_STORAGE = 'etl.parse_user_data.delta';
    const MERGE_PARSE_USER_DATA_FROM_STORAGE = 'etl.parse_user_data.merge';

    const REBUILD_PARSE_CARS_FROM_LEGACY_BACKUP_STORAGE = 'etl.rebuild.parse_cars_from_legacy_backup_storage';

    const DELTA_PARSE_EVENTS_DATA = 'etl.parse_events_data';
    const MERGE_EVENTS_DATA = 'etl.merge_events_data';

    const DEFAULT_MIN_DATE = '2000-01-01';
    const DEFAULT_MAX_DATE = '2037-01-01';

    const MAX_ODOMETER = 10000000;
    const MAX_CARID = 100000;

    const MAX_MICRO_TIME = 2114352000000;
    const MAX_TIMESTAMP = 2114352000;

    const QUEUE_PUBLIC = 'etl.public';
}