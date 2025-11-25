<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ContactSubmission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'calculator',
        'priority',
        'message',
        'ip_address',
        'user_agent',
        'status',
        'responded_at',
        'admin_notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'responded_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'ip_address',
        'user_agent',
    ];

    /**
     * Priority options with labels and colors
     */
    const PRIORITIES = [
        'low' => [
            'label' => 'Low',
            'color' => 'gray',
            'icon' => 'arrow-down',
        ],
        'normal' => [
            'label' => 'Normal',
            'color' => 'blue',
            'icon' => 'minus',
        ],
        'high' => [
            'label' => 'High',
            'color' => 'red',
            'icon' => 'arrow-up',
        ],
    ];

    /**
     * Status options with labels and colors
     */
    const STATUSES = [
        'new' => [
            'label' => 'New',
            'color' => 'blue',
            'icon' => 'envelope',
        ],
        'in_progress' => [
            'label' => 'In Progress',
            'color' => 'yellow',
            'icon' => 'clock',
        ],
        'resolved' => [
            'label' => 'Resolved',
            'color' => 'green',
            'icon' => 'check',
        ],
        'closed' => [
            'label' => 'Closed',
            'color' => 'gray',
            'icon' => 'archive',
        ],
    ];

    /**
     * Calculator options
     */
    const CALCULATORS = [
        'freelancer-rate' => 'Freelancer Rate Calculator',
        'currency-exchange' => 'Currency Exchange Calculator',
        'interest-rate' => 'Interest Rate Calculator',
        'binary-converter' => 'Binary/Hex Converter',
        'subnet-calculator' => 'IP Subnet Calculator',
        'download-time' => 'Download Time Calculator',
        'json-formatter' => 'JSON Formatter',
        'base64-converter' => 'Base64 Converter',
    ];

    /**
     * Subject options
     */
    const SUBJECTS = [
        'general' => 'General Inquiry',
        'technical' => 'Technical Support',
        'feedback' => 'Feedback & Suggestions',
        'bug' => 'Report a Bug',
        'feature' => 'Feature Request',
        'partnership' => 'Partnership Opportunity',
        'other' => 'Other',
    ];

    /**
     * Scope a query to only include new submissions.
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Scope a query to only include high priority submissions.
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }

    /**
     * Scope a query to only include submissions from a specific email.
     */
    public function scopeFromEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    /**
     * Scope a query to only include submissions for a specific calculator.
     */
    public function scopeForCalculator($query, $calculator)
    {
        return $query->where('calculator', $calculator);
    }

    /**
     * Scope a query to order by priority (high to low) and creation date.
     */
    public function scopeOrderByPriority($query)
    {
        return $query->orderByRaw("FIELD(priority, 'high', 'normal', 'low')")
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Check if the submission is new.
     */
    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    /**
     * Check if the submission is high priority.
     */
    public function isHighPriority(): bool
    {
        return $this->priority === 'high';
    }

    /**
     * Mark the submission as responded.
     */
    public function markAsResponded(): bool
    {
        return $this->update([
            'status' => 'in_progress',
            'responded_at' => now(),
        ]);
    }

    /**
     * Mark the submission as resolved.
     */
    public function markAsResolved(): bool
    {
        return $this->update([
            'status' => 'resolved',
        ]);
    }

    /**
     * Get the priority label.
     */
    public function getPriorityLabel(): string
    {
        return self::PRIORITIES[$this->priority]['label'] ?? ucfirst($this->priority);
    }

    /**
     * Get the priority color.
     */
    public function getPriorityColor(): string
    {
        return self::PRIORITIES[$this->priority]['color'] ?? 'gray';
    }

    /**
     * Get the priority icon.
     */
    public function getPriorityIcon(): string
    {
        return self::PRIORITIES[$this->priority]['icon'] ?? 'circle';
    }

    /**
     * Get the status label.
     */
    public function getStatusLabel(): string
    {
        return self::STATUSES[$this->status]['label'] ?? ucfirst($this->status);
    }

    /**
     * Get the status color.
     */
    public function getStatusColor(): string
    {
        return self::STATUSES[$this->status]['color'] ?? 'gray';
    }

    /**
     * Get the status icon.
     */
    public function getStatusIcon(): string
    {
        return self::STATUSES[$this->status]['icon'] ?? 'circle';
    }

    /**
     * Get the calculator name.
     */
    public function getCalculatorName(): string
    {
        return self::CALCULATORS[$this->calculator] ?? $this->calculator;
    }

    /**
     * Get the subject label.
     */
    public function getSubjectLabel(): string
    {
        return self::SUBJECTS[$this->subject] ?? $this->subject;
    }

    /**
     * Get the first name from the full name.
     */
    public function getFirstName(): string
    {
        return explode(' ', $this->name)[0];
    }

    /**
     * Check if the submission has a calculator associated.
     */
    public function hasCalculator(): bool
    {
        return !empty($this->calculator);
    }

    /**
     * Get the submission age in days.
     */
    public function getAgeInDays(): int
    {
        return $this->created_at->diffInDays(now());
    }

    /**
     * Check if the submission is older than specified days.
     */
    public function isOlderThan(int $days): bool
    {
        return $this->getAgeInDays() > $days;
    }

    /**
     * Accessor for formatted created_at date.
     */
    protected function formattedCreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->format('M j, Y g:i A'),
        );
    }

    /**
     * Accessor for short message preview.
     */
    protected function messagePreview(): Attribute
    {
        return Attribute::make(
            get: function () {
                $message = strip_tags($this->message);
                return strlen($message) > 100 
                    ? substr($message, 0, 100) . '...' 
                    : $message;
            },
        );
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Set IP address if not set
            if (empty($model->ip_address)) {
                $model->ip_address = request()->ip();
            }

            // Set user agent if not set
            if (empty($model->user_agent)) {
                $model->user_agent = request()->userAgent();
            }
        });
    }
}