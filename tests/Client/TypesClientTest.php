<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Tests\Client;

use MagicLegacy\Component\MtgJson\Client\MtgJsonClient;
use MagicLegacy\Component\MtgJson\Entity\CardTypes;
use MagicLegacy\Component\MtgJson\Exception\MtgJsonComponentException;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Log\NullLogger;

/**
 * Class TypesClientTest
 */
class TypesClientTest extends TestCase
{
    /**
     * @return void
     * @throws MtgJsonComponentException
     * @throws ClientExceptionInterface
     */
    public function testICanRequestCardTypesEndpoint(): void
    {
        $cardTypes = $this->getClient(200, $this->getCardTypesResponse())->getCardTypes();

        $this->assertInstanceOf(CardTypes::class, $cardTypes);
    }

    private function getClient(int $status, string $body, \Throwable $exception = null): MtgJsonClient
    {
        $httpFactory = new Psr17Factory();
        $response = $httpFactory->createResponse($status);
        $response->getBody()->write($body);
        $response->getBody()->rewind();

        $httpClientMock = $this->createMock(ClientInterface::class);

        if (!empty($exception)) {
            $httpClientMock
                ->method('sendRequest')
                ->willThrowException($exception)
            ;
        } else {
            $httpClientMock
                ->method('sendRequest')
                ->willReturn($response);
        }

        return new MtgJsonClient($httpClientMock, $httpFactory, $httpFactory, $httpFactory, new NullLogger());
    }

    /**
     * @return string
     */
    private function getCardTypesResponse(): string
    {
        return '{"data": {"artifact": {"subTypes": ["Clue", "Contraption", "Equipment", "Food", "Fortification", "Gold", "Treasure", "Vehicle"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "conspiracy": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "creature": {"subTypes": ["Advisor", "Aetherborn", "Ally", "Angel", "Antelope", "Ape", "Archer", "Archon", "Army", "Artificer", "Assassin", "Assembly-Worker", "Atog", "Aurochs", "Avatar", "Azra", "Badger", "Barbarian", "Basilisk", "Bat", "Bear", "Beast", "Beeble", "Berserker", "Bird", "Blinkmoth", "Boar", "Bringer", "Brushwagg", "Camarid", "Camel", "Caribou", "Carrier", "Cat", "Centaur", "Cephalid", "Chicken", "Chimera", "Citizen", "Cleric", "Cockatrice", "Construct", "Coward", "Crab", "Crocodile", "Cyclops", "Dauthi", "Demigod", "Demon", "Deserter", "Devil", "Dinosaur", "Djinn", "Dog", "Dragon", "Drake", "Dreadnought", "Drone", "Druid", "Dryad", "Dwarf", "Efreet", "Egg", "Elder", "Eldrazi", "Elemental", "Elephant", "Elf", "Elk", "Eye", "Faerie", "Ferret", "Fish", "Flagbearer", "Fox", "Frog", "Fungus", "Gargoyle", "Germ", "Giant", "Gnome", "Goat", "Goblin", "God", "Golem", "Gorgon", "Graveborn", "Gremlin", "Griffin", "Hag", "Harpy", "Head", "Hellion", "Hippo", "Hippogriff", "Homarid", "Homunculus", "Hornet", "Horror", "Horse", "Human", "Hydra", "Hyena", "Illusion", "Imp", "Incarnation", "Insect", "Jackal", "Jellyfish", "Juggernaut", "Kavu", "Kirin", "Kithkin", "Knight", "Kobold", "Kor", "Kraken", "Lamia", "Lammasu", "Leech", "Leviathan", "Lhurgoyf", "Licid", "Lizard", "Manticore", "Masticore", "Mercenary", "Merfolk", "Metathran", "Minion", "Minotaur", "Mole", "Monger", "Mongoose", "Monk", "Monkey", "Moonfolk", "Mouse", "Mutant", "Myr", "Mystic", "Naga", "Nautilus", "Nephilim", "Nightmare", "Nightstalker", "Ninja", "Noble", "Noggle", "Nomad", "Nymph", "Octopus", "Ogre", "Ooze", "Orb", "Orc", "Orgg", "Otter", "Ouphe", "Ox", "Oyster", "Pangolin", "Peasant", "Pegasus", "Pentavite", "Pest", "Phelddagrif", "Phoenix", "Pilot", "Pincher", "Pirate", "Plant", "Praetor", "Prism", "Processor", "Rabbit", "Rat", "Rebel", "Reflection", "Reveler", "Rhino", "Rigger", "Rogue", "Rukh", "Sable", "Salamander", "Samurai", "Sand", "Saproling", "Satyr", "Scarecrow", "Scion", "Scorpion", "Scout", "Sculpture", "Serf", "Serpent", "Servo", "Shade", "Shaman", "Shapeshifter", "Shark", "Sheep", "Siren", "Skeleton", "Slith", "Sliver", "Slug", "Snake", "Soldier", "Soltari", "Spawn", "Specter", "Spellshaper", "Sphinx", "Spider", "Spike", "Spirit", "Splinter", "Sponge", "Squid", "Squirrel", "Starfish", "Surrakar", "Survivor", "Teddy", "Tentacle", "Tetravite", "Thalakos", "Thopter", "Thrull", "Treefolk", "Trilobite", "Triskelavite", "Troll", "Turtle", "Unicorn", "Vampire", "Vedalken", "Viashino", "Volver", "Wall", "Warlock", "Warrior", "Wasp", "Weird", "Werewolf", "Whale", "Wizard", "Wolf", "Wolverine", "Wombat", "Worm", "Wraith", "Wurm", "Yeti", "Zombie", "Zubera"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "enchantment": {"subTypes": ["Aura", "Cartouche", "Curse", "Saga", "Shrine"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "instant": {"subTypes": ["Adventure", "Arcane", "Trap"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "land": {"subTypes": ["Desert", "Forest", "Gate", "Island", "Lair", "Locus", "Mine", "Mountain", "Plains", "Power-Plant", "Swamp", "Tower", "Urza’s"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "phenomenon": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "plane": {"subTypes": ["Alara", "Arkhos", "Azgol", "Belenon", "Bolas’s Meditation Realm", "Dominaria", "Equilor", "Ergamon", "Fabacin", "Innistrad", "Iquatana", "Ir", "Kaldheim", "Kamigawa", "Karsus", "Kephalai", "Kinshala", "Kolbahan", "Kyneth", "Lorwyn", "Luvion", "Mercadia", "Mirrodin", "Moag", "Mongseng", "Muraganda", "New Phyrexia", "Phyrexia", "Pyrulea", "Rabiah", "Rath", "Ravnica", "Regatha", "Segovia", "Serra’s Realm", "Shadowmoor", "Shandalar", "Ulgrotha", "Valla", "Vryn", "Wildfire", "Xerex", "Zendikar"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "planeswalker": {"subTypes": ["Abian", "Ajani", "Aminatou", "Angrath", "Arlinn", "Ashiok", "B.O.B.", "Basri", "Bolas", "Calix", "Chandra", "Dack", "Daretti", "Davriel", "Domri", "Dovin", "Duck", "Dungeon", "Elspeth", "Estrid", "Freyalise", "Garruk", "Gideon", "Huatli", "Inzerva", "Jace", "Jaya", "Karn", "Kasmina", "Kaya", "Kiora", "Koth", "Liliana", "Lukka", "Master", "Nahiri", "Narset", "Nissa", "Nixilis", "Oko", "Ral", "Rowan", "Saheeli", "Samut", "Sarkhan", "Serra", "Sorin", "Tamiyo", "Teferi", "Teyo", "Tezzeret", "Tibalt", "Ugin", "Urza", "Venser", "Vivien", "Vraska", "Will", "Windgrace", "Wrenn", "Xenagos", "Yanggu", "Yanling"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "scheme": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "sorcery": {"subTypes": ["Adventure", "Arcane", "Trap"], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "tribal": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}, "vanguard": {"subTypes": [], "superTypes": ["Basic", "Legendary", "Ongoing", "Snow", "World"]}}, "meta": {"date": "2020-09-01", "version": "5.0.1+20200901"}}';
    }
}
