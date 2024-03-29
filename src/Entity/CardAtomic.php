<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Entity;

use MagicLegacy\Component\MtgJson\Serializer\MtgJsonSerializableTrait;

/**
 * Class Card
 *
 * @author Romain Cottard
 */
final class CardAtomic implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    private string $manaCost;
    private float $convertedManaCost;
    private float $faceConvertedManaCost;
    private string $side;
    private string $faceName;
    private string $name;
    private string $asciiName;
    private string $text;
    private string $type;
    private string $loyalty;
    private string $power;
    private string $toughness;
    private string $hand;
    private string $life;
    private string $layout;
    private bool $hasAlternativeDeckLimit;
    private bool $isReserved;
    private int $edhrecRank;

    private LeadershipSkills $leadershipSkills;
    private Legalities $legalities;
    private PurchaseUrls $purchaseUrls;
    private Identifiers $identifiers;

    /** @var string[] $keywords */
    private array $keywords;

    /** @var string[] $colorIdentity */
    private array $colorIdentity;

    /** @var string[] $colorIndicator */
    private array $colorIndicator;

    /** @var string[] $colors */
    private array $colors;

    /** @var string[] $subTypes */
    private array $subTypes;

    /** @var string[] $superTypes */
    private array $superTypes;

    /** @var string[] $types */
    private array $types;

    /** @var Ruling[] $rulings */
    private array $rulings;

    /** @var ForeignData[] $foreignData */
    private array $foreignData;

    /** @var string[] $printings Set code of printed version*/
    private array $printings;

    /**
     * Class constructor.
     *
     * @param string $manaCost
     * @param float $convertedManaCost
     * @param float $faceConvertedManaCost
     * @param string $side
     * @param string $faceName
     * @param string $name
     * @param string $asciiName
     * @param string[] $colorIdentity
     * @param string[] $colorIndicator
     * @param string[] $colors
     * @param string[] $subTypes
     * @param string[] $superTypes
     * @param string $type
     * @param string[] $types
     * @param string[] $keywords
     * @param string $text
     * @param string $loyalty
     * @param string $power
     * @param string $toughness
     * @param string $hand
     * @param string $life
     * @param bool $hasAlternativeDeckLimit
     * @param LeadershipSkills $leadershipSkills
     * @param Legalities $legalities
     * @param string $layout
     * @param ForeignData[] $foreignData
     * @param string[] $printings
     * @param PurchaseUrls $purchaseUrls
     * @param bool $isReserved
     * @param int $edhrecRank
     * @param Identifiers $identifiers
     * @param Ruling[] $rulings
     */
    public function __construct(
        string $manaCost,
        float $convertedManaCost,
        float $faceConvertedManaCost,
        string $side,
        string $faceName,
        string $name,
        string $asciiName,
        array $colorIdentity,
        array $colorIndicator,
        array $colors,
        array $subTypes,
        array $superTypes,
        string $type,
        array $types,
        array $keywords,
        string $text,
        string $loyalty,
        string $power,
        string $toughness,
        string $hand,
        string $life,
        bool $hasAlternativeDeckLimit,
        LeadershipSkills $leadershipSkills,
        Legalities $legalities,
        string $layout,
        array $foreignData,
        array $printings,
        PurchaseUrls $purchaseUrls,
        bool $isReserved,
        int $edhrecRank,
        Identifiers $identifiers,
        array $rulings
    ) {
        $this->manaCost                = $manaCost;
        $this->convertedManaCost       = $convertedManaCost;
        $this->faceConvertedManaCost   = $faceConvertedManaCost;
        $this->side                    = $side;
        $this->faceName                = $faceName;
        $this->name                    = $name;
        $this->asciiName               = $asciiName;
        $this->colorIdentity           = $colorIdentity;
        $this->colorIndicator          = $colorIndicator;
        $this->colors                  = $colors;
        $this->subTypes                = $subTypes;
        $this->superTypes              = $superTypes;
        $this->type                    = $type;
        $this->types                   = $types;
        $this->keywords                = $keywords;
        $this->text                    = $text;
        $this->loyalty                 = $loyalty;
        $this->power                   = $power;
        $this->toughness               = $toughness;
        $this->hand                    = $hand;
        $this->life                    = $life;
        $this->hasAlternativeDeckLimit = $hasAlternativeDeckLimit;
        $this->leadershipSkills        = $leadershipSkills;
        $this->legalities              = $legalities;
        $this->layout                  = $layout;
        $this->foreignData             = $foreignData;
        $this->printings               = $printings;
        $this->purchaseUrls            = $purchaseUrls;
        $this->isReserved              = $isReserved;
        $this->edhrecRank              = $edhrecRank;
        $this->identifiers             = $identifiers;
        $this->rulings                 = $rulings;
    }

    /**
     * @return Ruling[]
     */
    public function getRulings(): array
    {
        return $this->rulings;
    }

    public function getManaCost(): string
    {
        return $this->manaCost;
    }

    public function getConvertedManaCost(): float
    {
        return $this->convertedManaCost;
    }

    public function getFaceConvertedManaCost(): float
    {
        return $this->faceConvertedManaCost;
    }

    public function getSide(): string
    {
        return $this->side;
    }

    public function getFaceName(): string
    {
        return $this->faceName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAsciiName(): string
    {
        return $this->asciiName;
    }

    /**
     * @return string[]
     */
    public function getColorIdentity(): array
    {
        return $this->colorIdentity;
    }

    /**
     * @return string[]
     */
    public function getColorIndicator(): array
    {
        return $this->colorIndicator;
    }

    /**
     * @return string[]
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * @return string[]
     */
    public function getSubTypes(): array
    {
        return $this->subTypes;
    }

    /**
     * @return string[]
     */
    public function getSupertypes(): array
    {
        return $this->superTypes;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @return string[]
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getLoyalty(): string
    {
        return $this->loyalty;
    }

    public function getPower(): string
    {
        return $this->power;
    }

    public function getToughness(): string
    {
        return $this->toughness;
    }

    public function getHand(): string
    {
        return $this->hand;
    }

    public function getLife(): string
    {
        return $this->life;
    }

    public function hasAlternativeDeckLimit(): bool
    {
        return $this->hasAlternativeDeckLimit;
    }

    public function getLeadershipSkills(): LeadershipSkills
    {
        return $this->leadershipSkills;
    }

    public function getLegalities(): Legalities
    {
        return $this->legalities;
    }

    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @return ForeignData[]
     */
    public function getAllForeignData(): array
    {
        return $this->foreignData;
    }

    public function getForeignData(string $language): ForeignData
    {
        return $this->foreignData[$language] ?? new ForeignData('', '', '', '', '', 0, '');
    }

    /**
     * @return string[]
     */
    public function getPrintings(): array
    {
        return $this->printings;
    }

    public function getPurchaseUrls(): PurchaseUrls
    {
        return $this->purchaseUrls;
    }

    public function isReserved(): bool
    {
        return $this->isReserved;
    }

    public function getEdhrecRank(): int
    {
        return $this->edhrecRank;
    }

    public function getIdentifiers(): Identifiers
    {
        return $this->identifiers;
    }
}
