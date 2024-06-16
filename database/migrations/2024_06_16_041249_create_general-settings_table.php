<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->text('site_description')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('support_email')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->string('posthog_html_snippet')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->json('seo_metadata')->nullable();
            $table->json('email_settings')->nullable();
            $table->string('email_from_address')->nullable();
            $table->string('default_email_provider')->nullable();
            $table->string('email_from_name')->nullable();
            $table->json('social_network')->nullable();
            $table->string('mail_to')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_encryption')->nullable();
            $table->string('smtp_timeout')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('mailgun_domain')->nullable();
            $table->string('mailgun_secret')->nullable();
            $table->string('mailgun_endpoint')->nullable();
            $table->string('postmark_token')->nullable();
            $table->string('amazon_ses_key')->nullable();
            $table->string('amazon_ses_secret')->nullable();
            $table->string('amazon_ses_region')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_preview')->nullable();
            $table->json('more_configs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }

};
