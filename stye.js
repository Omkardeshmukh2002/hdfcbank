const mongoose = require('mongoose');

const applicationSchema = new mongoose.Schema({
  fullName: { type: String, required: true },
  email: { type: String, required: true },
  loanAmount: { type: Number, required: true },
  loanPurpose: { type: String, required: true },
  employment: { type: String, required: true },
  createdAt: { type: Date, default: Date.now }
});

const Application = mongoose.model('Application', applicationSchema);

module.exports = Application;
const express = require('express');
const router = express.Router();
const Application = require('../models/application');

router.post('/submit', async (req, res) => {
  try {
    const application = new Application(req.body);
    await application.save();
    res.status(201).json({ message: 'Application submitted successfully.' });
  } catch (error) {
    res.status(500).json({ error: 'An error occurred while submitting the application.' });
  }
});

module.exports = router;
const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const applicationRoutes = require('./routes/applicationRoutes');

const app = express();

mongoose.connect('mongodb://localhost:27017/loan-application', {
  useNewUrlParser: true,
  useUnifiedTopology: true
});
mongoose.connection.on('error', console.error.bind(console, 'MongoDB connection error:'));
mongoose.set('useFindAndModify', false);

app.use(bodyParser.json());

app.use('/api/application', applicationRoutes);

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
