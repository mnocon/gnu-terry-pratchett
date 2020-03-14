Feature: Add X-Clacks-Overhead "GNU Terry Pratchett" header

  Scenario: I can see the header when I visit the page
    Given I am on the homepage
    Then I can see a server header
      | name              | value               |
      | X-Clacks-Overhead | GNU Terry Pratchett |