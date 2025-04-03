<?php
namespace App\Domain\Auth\ValueObjects;

class Address
{
    private string $street;
    private string $city;
    private string $country;
    private string $zip;

    public function __construct(string $street, string $city, string $country, string $zip)
    {
        $this->validate($street, $city, $country, $zip);
        $this->street = $street;
        $this->city = $city;
        $this->country = $country;
        $this->zip = $zip;
    }

    private function validate(string $street, string $city, string $country, string $zip): void
    {
        if (empty($street) || empty($city) || empty($country) || empty($zip)) {
            throw new \InvalidArgumentException('All address fields (street, city, country, zip) must be provided.');
        }
        // Add more validation if needed (e.g., zip format)
    }

    public function street(): string { return $this->street; }
    public function city(): string { return $this->city; }
    public function country(): string { return $this->country; }
    public function zip(): string { return $this->zip; }

    public function toString(): string
    {
        return "$this->street, $this->city, $this->country $this->zip";
    }

    public function toArray(): array
    {
        return [
            'street' => $this->street,
            'city' => $this->city,
            'country' => $this->country,
            'zip' => $this->zip,
        ];
    }

    public function equals(Address $other): bool
    {
        return $this->street === $other->street &&
            $this->city === $other->city &&
            $this->country === $other->country &&
            $this->zip === $other->zip;
    }
}
