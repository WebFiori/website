<?php
/*
 * The MIT License
 *
 * Copyright 2019 Ibrahim, WebFiori Framework.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace webfiori\ini;

use webfiori\entity\cron\Cron;

class InitCron {
    /**
     * A method that can be used to initialize cron jobs.
     * The developer can use this method to create cron jobs.
     * @since 1.0
     */
    public static function init() {

        Cron::createJob('*/10 * * * *', 'Every Minute', function () {
            echo "Will execute every 10 minutes";
        });
        
        Cron::dailyJob("13:00", "Test Job", function () {
            echo "Will execute every day at 1:00 PM";
        });
        
        Cron::weeklyJob('sun-15:30', 'Another Job', function () {
            echo "Will execute every sunday at 3:30 PM";
        });
        
        Cron::monthlyJob(1, '00:00', 'First Day Of Month', function () {
            echo "Will execute at first day of every month at 12:00 AM";
        });
    }
}
