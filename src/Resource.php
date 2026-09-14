<?php

class Resource
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $title,
        public readonly string $type,
        public readonly string $status,
        public readonly ?string $borrower,
        public readonly ?string $createdAt = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['id']) ? (int) $data['id'] : null,
            trim($data['title'] ?? ''),
            trim($data['type'] ?? ''),
            $data['status'] ?? 'disponible',
            trim($data['borrower'] ?? '') ?: null,
            $data['created_at'] ?? null
        );
    }
}

