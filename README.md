# Pizza House - Kitchen Domain Prototype

This is a prototype implementation of the Kitchen domain for the Pizza House application, developed using the Symfony framework.

## Overview

The Kitchen domain is responsible for the core functionality related to pizza making, including:

- Preparing pizzas based on customer orders
- Managing the inventory of ingredients
- Maintaining recipes and kitchen equipment
- Coordinating with the kitchen staff

This prototype focuses on implementing a fully functional Kitchen domain, including the following key components:

- Domain model (Aggregate Roots, Entities, Value Objects)
- Events and message handlers
- Repositories for data persistence
- Application services for coordinating the domain logic

## Domain Model

The main Aggregate Roots in the Kitchen domain are:

1. **Pizza**
   - `Pizza` entity
   - `Recipe` entity
   - `OrderItem` entity
   - `PizzaSize` value object
   - `PizzaPrice` value object

2. **Inventory**
   - `InventoryItem` entity
   - `QuantityUnit` value object
   - `ExpirationDate` value object

3. **KitchenEvent**
   - `KitchenEvent` entity
   - `EventType` value object
   - `EventDate` value object

These Aggregate Roots encapsulate the relevant entities and value objects, ensuring the integrity of the domain model.

## User Stories

1. **As a kitchen staff member, I want to be notified when a new order is placed and easily access the order details.**
   - This user story is addressed by the `PizzaCreatedEvent` and the `PizzaCreatedEventHandler`, which update the Inventory and notify the kitchen staff of new orders.
   - The `PizzaRepository` and the `OrderItem` entity provide the necessary information and access to the order details.

2. **As a store manager, I want to view real-time ingredient inventory and automatically trigger purchase orders when stock falls below a threshold.**
   - The `InventoryRepository` and the `InventoryUpdatedEvent` handle the real-time tracking and updating of ingredient inventory.
   - The `InventoryUpdatedEventHandler` is responsible for triggering purchase orders when stock levels fall below the defined thresholds.

3. **As a kitchen chief, I want to be able to create the type of pizzas that we are going to sell, their names, their price and their required ingredients.**
   - The `PizzaService` and the `PizzaRepository` provide the functionality to create, update, and manage the pizzas, including their names, prices, and required ingredients.
   - The `Recipe` entity and the `PizzaSize` and `PizzaPrice` value objects encapsulate the necessary information for defining a pizza.

## Events and Message Handlers

The prototype includes the following events and message handlers:

1. `PizzaCreatedEvent`
   - Triggered when a new `Pizza` is created
   - Handled by the `PizzaCreatedEventHandler` to update the Inventory

2. `InventoryUpdatedEvent`
   - Triggered when the Inventory is updated
   - Handled by the `InventoryUpdatedEventHandler` to notify other domains (e.g., Procurement)

These events and message handlers help maintain the consistency of the domain model and enable communication between different domains.

## Repositories

The prototype includes the following repositories:

1. `PizzaRepository`
2. `InventoryRepository`
3. `KitchenEventRepository`

These repositories abstract the data persistence layer and provide a consistent interface for interacting with the domain model.

## Application Services

The prototype includes the following application services:

1. `PizzaService`
2. `InventoryService`
3. `KitchenEventService`

These application services coordinate the domain logic and ensure that the business rules are properly enforced.

## Getting Started

To set up the Kitchen domain prototype, follow these steps:

1. Clone the repository: `git clone https://github.com/duaneandrea/pizza-house.git`
2. Install the dependencies: `composer install`
3. Set up the database: `php bin/console doctrine:database:create`
4. Run the migrations: `php bin/console doctrine:migrations:migrate`
5. Start the development server: `symfony server:start`

The application will be available at `http://localhost:8000`.

## Explanations

1. **Functionality Decisions**:
   - The prototype focuses on the core functionality of the Kitchen domain, including pizza preparation, inventory management, and kitchen event handling.
   - The use of the Command and Query pattern, along with the event-driven architecture, ensures a clean separation of concerns and enables future scalability.
   - The domain model is designed to be extensible, allowing for the addition of new features or the modification of existing ones without affecting the overall system.

2. **Architecture Decisions**:
   - The Symfony framework was chosen for its robust infrastructure, extensive documentation, and strong community support, making it a suitable choice for building a modern, scalable web application.
   - The use of Aggregate Roots, Entities, and Value Objects, along with the Repository pattern, aligns with the principles of Domain-Driven Design (DDD) and promotes maintainability and testability.
   - The event-driven architecture, with the help of the Messenger component, enables asynchronous communication between different domains and fosters a loosely coupled design.

3. **Getting the Application Running**:
   - The steps outlined in the "Getting Started" section provide a straightforward way to set up the Kitchen domain prototype, including cloning the repository, installing dependencies, setting up the database, and running the development server.
   - Once the setup is complete, you can access the Kitchen domain functionality at `http://localhost:8000`.
