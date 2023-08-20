<?php

namespace App\Helpers\Flash;

use Illuminate\Support\Facades\Session;

class Flash
{
    public function __construct(
        public readonly FlashType $type,
        public readonly string $message,
        public readonly ?string $title = null,
        public readonly bool $autohide = true,
        public readonly int $delay = 5000,
    )
    {
    }

    public static function add(FlashType $type, string $message, ?string $title = null): void
    {
        Session::push($type->value, new self($type, $message, $title));
    }

    public static function push(self $flash): void
    {
        Session::push($flash->type->value, $flash);
    }

    public static function get(): \Generator
    {
        foreach (FlashType::cases() as $flashType) {
            foreach (Session::pull($flashType->value, []) as $messageArray) {
                yield $messageArray;
            }
        }
    }

    public function configArray(): array
    {
        return ['autohide' => $this->autohide, 'delay' => $this->delay];
    }

}
