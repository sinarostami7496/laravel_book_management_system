<?php

namespace App;

use App\Preference;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    private $preferences;

    function __construct(array $attributes = [])
    {
        $this->preferences = Preference::find(1);
    }

    // 获取超期天数
    public function extendedDays()
    {
        return Carbon::now()->diffInDays($this->created_at) - $this->preferences->init_borrow_days;
    }
}
