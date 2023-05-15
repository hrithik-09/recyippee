<div class="modal modal-recipe" tabindex="-1" aria-labelledby="recipeModalLabel" id="recipeModal" aria-hidden="true">
  <div class="modal-dialog" style=" width: 1000px;
  transition: bottom .75s ease-in-out;" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Add Your Delicious Recipe </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form action="/recyippee/partials/_handlerecipe.php" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="RecipeName" name="RecipeName" placeholder="Recipe Name" required>
            <label for="RecipeName">Recipe Name</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="Description" name="Description" rows="3" placeholder="Description"></textarea>
            <label for="Description">Description</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="Ingredients" name="Ingredients" placeholder="Ingredients" rows="3" ></textarea>
            <label for="Ingredients">Ingredients</label>
          </div>
          <div class="form-floating mb-3">
            <h6 class="mb-2">Category: </h6>
            <div class="form-check form-check-inline mb-3 me-4">
              <input class="form-check-input" type="radio" name="Category" id="Category"
              value="Veg" />
              <label class="form-check-label" for="Category">Veg</label>
            </div>
            
            <div class="form-check form-check-inline mb-3 me-4">
              <input class="form-check-input" type="radio" name="Category" id="Category"
              value="Non-Veg" />
              <label class="form-check-label" for="Category">Non-Veg</label>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="Tag" name="Tag" placeholder="Tag" required>
            <label for="Tag">Tag</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="Instructions" name="Instructions" rows="3" placeholder="Instructions"></textarea>
            <label for="Instructions">Instructions</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Upload Recipe</button>
        </form>
      </div>
    </div>
  </div>
</div>